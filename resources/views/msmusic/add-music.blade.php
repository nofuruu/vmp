@extends('layouts.app')

@section('title', 'Add Music')

@section('content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
</head>
<style>
    .dropzone {
        background-color: #1f2937;
        /* bg-gray-800 */
        border: 2px dashed #4b5563;
        /* border-gray-600 */
        border-radius: 0.5rem;
        /* rounded-lg */
        padding: 2rem;
        color: #d1d5db;
        /* text-gray-300 */
        text-align: center;
        font-size: 0.875rem;
        transition: border-color 0.3s ease;
    }

    .dropzone:hover {
        border-color: #6366f1;
        /* hover:ring-indigo-500 */
        background-color: #374151;
        /* bg-gray-700 */
    }

    .dropzone .dz-message {
        font-weight: 500;
    }

    .dropzone .dz-preview {
        margin-top: 1rem;
    }

    .dropzone .dz-remove {
        color: #f87171;
        /* text-red-400 */
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
    }
</style>


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
    <div class="bg-[#2f3036] rounded-2xl shadow-lg border border-gray-700">
        <div class="px-6 py-4 border-b border-gray-600 text-white text-lg font-semibold">
            Add Music
        </div>
        <div class="px-6 py-4">
            <form id="addMusic" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-200 mb-1">Title</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                placeholder="Enter the music title"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="album" class="block text-sm font-medium text-gray-200 mb-1">Album</label>
                            <input
                                type="text"
                                id="album"
                                name="album"
                                placeholder="Enter album name"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-200 mb-1">Genre</label>
                            <select
                                id="genre"
                                name="genre"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Select a genre</option>
                                <option value="pop">Pop</option>
                                <option value="rock">Rock</option>
                                <option value="jazz">Jazz</option>
                                <option value="hiphop">Hip-hop</option>
                            </select>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-200 mb-1">Description</label>
                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                placeholder="Short description of the music"
                                class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-200 mb-1">Cover Image</label>
                            <div class="dropzone" id="coverDropzone"></div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-200 mb-1">Audio File</label>
                            <div class="dropzone" id="audioDropzone"></div>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-6 py-2 rounded-lg transition duration-300 shadow-md">
                        Save Music
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<script>
    Dropzone.autoDiscover = false;

    const coverDropzone = new Dropzone("#coverDropzone", {
        url: "/upload/cover", // ganti sesuai rute backend kamu
        maxFiles: 1,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        paramName: "cover_img",
        dictDefaultMessage: "Drop or click to upload cover image"
    });

    const audioDropzone = new Dropzone("#audioDropzone", {
        url: "/upload/audio", // ganti sesuai rute backend kamu
        maxFiles: 1,
        acceptedFiles: "audio/*",
        addRemoveLinks: true,
        paramName: "audio_file",
        dictDefaultMessage: "Drop or click to upload audio file"
    });
</script>

@endsection