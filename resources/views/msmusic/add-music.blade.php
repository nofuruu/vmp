@extends('layouts.app')

@section('title', 'VMP | Dashboard')

@section('content')
<!DOCTYPE html>


<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('css/msmusic/add-music.css') }}">
</head>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
    <div class="bg-[#2f3036] rounded-2xl shadow-lg border border-gray-700">
        <div class="px-6 py-4 border-b border-gray-600 text-white text-lg font-semibold">
            Add Music
        </div>
        <div class="px-6 py-4">
            <form id="addMusicForm" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-200 mb-1">Title</label>
                            <input type="text" id="title" name="title"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="artist" class="block text-sm font-medium text-gray-200 mb-1">Artist</label>
                            <input type="text" id="artist" name="artist"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="duration" class="block text-sm font-medium text-gray-200 mb-1">Duration
                                (mm:ss)</label>
                            <input type="text" id="duration" name="duration" pattern="^([0-5]?\d):([0-5]\d)$"
                                maxlength="5"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="mm:ss" autocomplete="off" required
                                oninput="this.value = this.value.replace(/[^0-9:]/g, '').replace(/(\..*)\./g, '$1');">
                            <small class="text-gray-400">(contoh: 03:45)</small>
                        </div>
                        <div>
                            <label for="album" class="block text-sm font-medium text-gray-200 mb-1">Album</label>
                            <input type="text" id="album" name="album"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-200 mb-1">Genre</label>
                            <select id="genre" name="genre"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Select a genre</option>
                                @foreach ($genre as $genre)
                                <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-gray-200 mb-1">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-200 mb-1">Cover Image</label>
                            <div id="coverDropzone" class="dropzone bg-gray-800 border-gray-600"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-200 mb-1">Audio File</label>
                            <div id="audioDropzone" class="dropzone bg-gray-800 border-gray-600"></div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="cover_url" id="cover_url">
                <input type="hidden" name="audio_url" id="audio_url">

                <div class="pt-4">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-6 py-2 rounded-lg">
                        Save Music
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
    Dropzone.autoDiscover = false;

    function setUrlInput(id, url) {
        document.getElementById(id).value = url;
    }

    const coverDropzone = new Dropzone("#coverDropzone", {
        url: "http://10.21.1.125:8000/api/upload-cover",
        paramName: "cover_img",
        maxFiles: 1,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('api_token')}`
        },
        dictDefaultMessage: "Drop or click to upload cover image",
        init() {
            this.on("success", (file, res) => {
                setUrlInput("cover_url", res.url);
            });
            this.on("removedfile", () => {
                setUrlInput("cover_url", "");
            });
        }
    });

    const audioDropzone = new Dropzone("#audioDropzone", {
        url: "http://10.21.1.125:8000/api/upload-audio",
        paramName: "audio_file",
        maxFiles: 1,
        acceptedFiles: "audio/*",
        addRemoveLinks: true,
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('api_token')}`
        },
        dictDefaultMessage: "Drop or click to upload audio file",
        init() {
            this.on("success", (file, res) => {
                setUrlInput("audio_url", res.url);
                const audio = document.createElement('audio');
                audio.controls = true;
                audio.src = res.url;
                file.previewElement.appendChild(audio);
            });
            this.on("removedfile", () => {
                setUrlInput("audio_url", "");
            });
        }
    });

    document.getElementById('addMusicForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const data = {
            title: document.getElementById('title').value,
            album: document.getElementById('album').value,
            genre: $('#genre').val(),
            artist: document.getElementById('artist').value,
            description: document.getElementById('description').value,
            duration: document.getElementById('duration').value,
            cover_url: document.getElementById('cover_url').value,
            audio_url: document.getElementById('audio_url').value,
        };

        if (!data.cover_url || !data.audio_url) {
            iziToast.warning({
                message: 'Please fill the audio and cover image',
                position: 'topRight',
                backgroundColor: '#1f2937',
                titleColor: '#fff',
                messageColor: '#fff',
                timeout: 3000
            });
        }
        // ...existing code...
        const durationPattern = /^([0-5]?\d):([0-5]\d)$/;
        if (!durationPattern.test(data.duration)) {
            iziToast.warning({
                message: 'Duration must be in required format mm:ss, ex: 5:23',
                position: 'topRight',
                backgroundColor: '#1f2937',
                titleColor: '#fff',
                messageColor: '#fff',
                timeout: 3000
            });
        }

        fetch('http://10.21.1.125:8000/api/music', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${localStorage.getItem('api_token')}`
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(json => {
                if (json.success) {
                    iziToast.success({
                        title: 'Upload Success',
                        message: 'Your music will displayed in dashboard',
                        position: 'top-right',
                        backgroundColor: '#16a34a',
                        titleColor: '#fff',
                        timeout: 3000
                    });
                    window.location.reload();
                } else {
                    iziToast.warning({
                        title: 'Upload music error',
                        message: 'Missing the following input requirements',
                        position: 'top-right',
                        backgroundColor: '#1f2937',
                        titleColor: '#fff',
                        messageColor: '#fff',
                        timeout: 3000
                    });
                }
            })
            .catch(err => {
                console.error(err);
                alert('An error occurred.');
            });
    });

    $(document).ready(function() {
        $('#genre').select2({
            dropdownAutoWidth: true,
            width: '100%',
            dropdownCssClass: "hide-scrollbar",
            dropdownParent: $('#genre').parent(), // agar dropdown tidak terpotong
            dropdownPosition: 'below' // pastikan dropdown ke bawah
        });
    });
</script>
@endsection