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
<div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-[#2f3036] p-6 rounded-lg shadow-xl border border-gray-700 max-w-sm w-full mx-4">
        <div class="flex items-center space-x-4">
            <div class="w-10 h-10 border-4 border-indigo-500 border-t-transparent rounded-full animate-spin"></div>
            <div class="flex-1">
                <h3 class="text-lg font-medium text-white" id="uploadStatus">Uploading...</h3>
                <div class="mt-2 w-full bg-gray-700 rounded-full h-2.5">
                    <div id="uploadProgress" class="bg-indigo-500 h-2.5 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
                <p class="text-sm text-gray-400 mt-2" id="uploadDetails">Preparing files...</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
    Dropzone.autoDiscover = false;

    function setUrlInput(id, url) {
        document.getElementById(id).value = url;
    }

    function showLoading(message = 'Uploading...') {
        document.getElementById('loadingOverlay').classList.remove('hidden');
        document.getElementById('loadingOverlay').classList.add('flex');
        document.getElementById('uploadStatus').textContent = message;
    }

    function updateProgress(percent, details) {
        document.getElementById('uploadProgress').style.width = `${percent}%`;
        document.getElementById('uploadDetails').textContent = details;
    }

    function hideLoading() {
        document.getElementById('loadingOverlay').classList.add('hidden');
        document.getElementById('loadingOverlay').classList.remove('flex');
    }

    function initializeDropzones() {
        coverDropzone = new Dropzone("#coverDropzone", {
            url: "http://10.21.1.125:8000/api/upload-cover",
            paramName: "cover_img",
            maxFiles: 1,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            autoProcessQueue: false, // Don't upload automatically
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

        audioDropzone = new Dropzone("#audioDropzone", {
            url: "http://10.21.1.125:8000/api/upload-audio",
            paramName: "audio_file",
            maxFiles: 1,
            acceptedFiles: "audio/*",
            addRemoveLinks: true,
            autoProcessQueue: false, // Don't upload automatically
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
    }

    document.getElementById('addMusicForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        // Check if files are selected
        if (!coverDropzone.files.length || !audioDropzone.files.length) {
            iziToast.warning({
                message: 'Please select both cover image and audio file',
                position: 'topRight',
                backgroundColor: '#1f2937',
                titleColor: '#fff',
                messageColor: '#fff',
                timeout: 3000
            });
            return;
        }

        try {
            showLoading("uploading cover images...");
            updateProgress(0, 'Processing cover image...')
            // Upload cover image first
            await new Promise((resolve, reject) => {
                coverDropzone.processQueue();
                coverDropzone.on("totaluploadprogress", function(progress) {
                    updateProgress(progress / 2, 'Uploading cover image...');
                });
                coverDropzone.on("complete", function(file) {
                    if (file.status === "success") {
                        updateProgress(50, 'Cover image uploaded successfully');
                        resolve();
                    } else {
                        reject(new Error("Cover upload failed"));
                    }
                });
            });

            updateProgress(50, 'Processing audio file...');
            // Then upload audio file
            await new Promise((resolve, reject) => {
                audioDropzone.processQueue();
                audioDropzone.on("totaluploadprogress", function(progress) {
                    updateProgress(50 + progress / 2, 'Uploading audio file...');
                });
                audioDropzone.on("complete", function(file) {
                    if (file.status === "success") {
                        updateProgress(100, 'Audio file uploaded successfully');
                        resolve();
                    } else {
                        reject(new Error("Audio upload failed"));
                    }
                });
            });

            showLoading('Saving music details...');
            // Once both uploads are complete, submit the form data
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

            // Validate duration format
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
                return;
            }

            // Submit the form data
            const response = await fetch('http://10.21.1.125:8000/api/music', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${localStorage.getItem('api_token')}`
                },
                body: JSON.stringify(data)
            });

            const json = await response.json();
            if (json.success) {
                hideLoading();
                iziToast.success({
                    title: 'Upload Success',
                    message: 'Your music has been uploaded successfully',
                    position: 'topRight',
                    backgroundColor: '#16a34a',
                    titleColor: '#fff',
                    timeout: 3000
                });
                window.location.reload();
            } else {
                throw new Error('Upload failed');
            }
        } catch (error) {
              hideLoading();
            iziToast.error({
                title: 'Error',
                message: error.message || 'An error occurred during upload',
                position: 'topRight',
                backgroundColor: '#dc2626',
                titleColor: '#fff',
                messageColor: '#fff',
                timeout: 3000
            });
        }
    });

    $(document).ready(function() {
        initializeDropzones();
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