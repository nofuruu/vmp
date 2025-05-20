@extends('layouts.app')

@section('title', 'VMP | Dashboard')

@section('content')
<!DOCTYPE html>


<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
</head>

<style>
    .dropzone {
        background-color: #1f2937;
        border: 2px dashed #4b5563;
        border-radius: 0.5rem;
        padding: 2rem;
        color: #d1d5db;
        text-align: center;
        font-size: 0.875rem;
        transition: border-color 0.3s ease;
    }

    .dropzone:hover {
        border-color: #6366f1;
        background-color: #374151;
    }

    .dropzone .dz-message {
        font-weight: 500;
    }

    .dropzone .dz-preview {
        background-color: transparent !important;
        border-radius: 0.5rem;
        overflow: hidden;
        padding: 0.5rem;
        position: relative;
    }

    .dropzone .dz-remove {
        color: #f87171;
        cursor: pointer;
    }

    .dropzone .dz-success-mark,
    .dropzone .dz-error-mark {
        display: none;
    }

    .dropzone .dz-error-message {
        color: #f87171;
        font-size: 0.75rem;
    }

    .dropzone .dz-details {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 0.5rem;
        background-color: transparent !important;
    }

    .dropzone .dz-preview .dz-image {
        background-color: transparent !important;
        border-radius: 0.5rem;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .dropzone .dz-preview .dz-image img {
        border-radius: 0.5rem;
        background-color: transparent !important;
    }

    /* Tambahan aturan untuk menghilangkan background putih */
    .dropzone * {
        background-color: transparent !important;
    }

    .dropzone .dz-preview.dz-image-preview {
        background-color: transparent !important;
    }

    .dropzone .dz-preview .dz-image canvas {
        background-color: transparent !important;
    }

    /* Aturan untuk memastikan thumbnail memiliki background gelap */
    .dropzone .dz-preview .dz-image img,
    .dropzone .dz-preview .dz-image canvas {
        background-color: #1f2937 !important;
    }

    .hide-scrollbar .select2-results__options::-webkit-scrollbar {
        width: 0 !important
    }

    .hide-scrollbar .select2-results__options {
        scrollbar-width: none;
    }

    .select2-container--default .select2-selection--single {
        background-color: #1f2937 !important;
        /* bg-gray-800 */
        border: 1px solid #4b5563 !important;
        /* border-gray-600 */
        color: #fff !important;
        /* text-white */
        border-radius: 0.5rem !important;
        /* rounded-lg */
        padding: 0.5rem 1rem !important;
        /* px-4 py-2 */
        height: auto !important;
        min-height: 42px;
        display: flex;
        align-items: center;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #fff !important;
        /* text-white */
        line-height: 2rem !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
    }

    .select2-dropdown {
        background-color: #1f2937 !important;
        /* bg-gray-800 */
        color: #fff !important;
        /* text-white */
        border: 1px solid #4b5563 !important;
        /* border-gray-600 */
    }

    .select2-results__option {
        color: #fff !important;
        /* text-white */
    }

    .select2-results__option--highlighted {
        background-color: #6366f1 !important;
        /* indigo-500 */
        color: #fff !important;
    }

    .select2-container--default .select2-search--dropdown .select2-search__field {
        background-color: #1f2937 !important;
        /* bg-gray-800 */
        color: #fff !important;
        /* text-white */
        border: 1px solid #4b5563 !important;
        /* border-gray-600 */
        padding: 0.5rem 0.75rem !important;
        border-radius: 0.5rem !important;
    }

    .select2-container--default .select2-results__option[aria-selected="true"] {
        background-color: #374151 !important;
        /* contoh: bg-gray-700 */
        color: #fff !important;
    }

    /* Style untuk audio player */
    audio {
        background-color: #1f2937 !important;
        border-radius: 0.5rem;
        width: 100%;
    }

    /* Style untuk kontrol audio */
    audio::-webkit-media-controls-panel {
        background-color: #1f2937 !important;
    }

    audio::-webkit-media-controls-current-time-display,
    audio::-webkit-media-controls-time-remaining-display {
        color: #ffffff !important;
    }

    audio::-webkit-media-controls-play-button,
    audio::-webkit-media-controls-timeline,
    audio::-webkit-media-controls-volume-slider {
        filter: invert(1);
    }

    /* Style untuk preview audio di dropzone */
    .dropzone .dz-preview .dz-details .dz-size,
    .dropzone .dz-preview .dz-details .dz-filename {
        color: #ffffff !important;
    }

    .dropzone .dz-preview {
        background-color: #1f2937 !important;
    }

    /* Style untuk audio preview container */
    .dz-preview audio {
        background-color: #1f2937 !important;
        border-radius: 0.5rem;
        margin-top: 0.5rem;
    }

    /* Style untuk teks filename */
    .dz-filename {
        color: #ffffff !important;
        margin-top: 0.5rem;
    }

    /* Style untuk size indicator */
    .dz-size {
        color: #ffffff !important;
    }

    /* Style untuk remove link */
    .dz-remove {
        color: #f87171 !important;
        margin-top: 0.5rem;
    }
</style>

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
            url: "http://10.21.1.27:8000/api/upload-cover",
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
            url: "http://10.21.1.27:8000/api/upload-audio",
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
                return alert('Please upload both cover image and audio file.');
            }
            // ...existing code...
            const durationPattern = /^([0-5]?\d):([0-5]\d)$/;
            if (!durationPattern.test(data.duration)) {
            return alert('Duration harus dalam format mm:ss, contoh: 03:45');
            }

            fetch('http://10.21.1.27:8000/api/music', {
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
                        alert('Music saved successfully!');
                        window.location.reload();
                    } else {
                        alert('Failed to save music.');
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