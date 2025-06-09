@extends('layouts/app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-[#2f3036] rounded-2xl shadow-lg border border-gray-700 overflow-hidden">
        <!-- Search Header -->
        <div class="p-6 border-b border-gray-700">
            <form id="searchForm" class="w-full">
                <div class="relative">
                    <!-- Search Input -->
                    <input type="search"
                        id="searchInput"
                        class="w-full bg-[#24252a] text-gray-800 border border-gray-600 rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                        placeholder="Search for songs, artists, or albums..."
                        autocomplete="off">

                    <!-- Loading Spinner (Hidden by default) -->
                    <div id="searchSpinner" class="absolute inset-y-0 right-0 pr-4 flex items-center hidden">
                        <div class="w-5 h-5 border-2 border-indigo-500 border-t-transparent rounded-full animate-spin"></div>
                    </div>
                </div>

                <!-- Filter Tags -->
                <div class="flex flex-wrap gap-2 mt-4">
                    <button type="button"
                        class="px-4 py-2 bg-[#24252a] text-gray-300 rounded-full border border-gray-600 hover:bg-gray-700 hover:border-indigo-500 transition-all duration-300 text-sm">
                        Songs
                    </button>
                    <button type="button"
                        class="px-4 py-2 bg-[#24252a] text-gray-300 rounded-full border border-gray-600 hover:bg-gray-700 hover:border-indigo-500 transition-all duration-300 text-sm">
                        Artists
                    </button>
                    <button type="button"
                        class="px-4 py-2 bg-[#24252a] text-gray-300 rounded-full border border-gray-600 hover:bg-gray-700 hover:border-indigo-500 transition-all duration-300 text-sm">
                        Albums
                    </button>
                    <button type="button"
                        class="px-4 py-2 bg-[#24252a] text-gray-300 rounded-full border border-gray-600 hover:bg-gray-700 hover:border-indigo-500 transition-all duration-300 text-sm">
                        Playlists
                    </button>
                </div>
            </form>
        </div>
        <div id="searchResults" class="p-6">
        </div>
    </div>
</div>

<script>
    const apiUrl = 'http://10.21.1.125:8000/api/songs';
    let searchTimeout;

    function loadMusic(query = '') {
        // Show loading spinner
        $('#searchSpinner').removeClass('hidden');

        // Build URL with search query if present
        let url = query ? `${apiUrl}/search?q=${encodeURIComponent(query)}` : apiUrl;

        $.get(url, function(response) {
            // Clear previous results
            $('#searchResults').empty();

            if (response.data && response.data.length > 0) {
                // Create results grid
                let resultsGrid = $('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">');

                response.data.forEach(function(music) {
                    resultsGrid.append(`
                        <div class="bg-[#24252a] rounded-lg overflow-hidden hover:bg-gray-700 transition-all duration-300">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="${music.cover_url}" 
                                     alt="${music.title}" 
                                     class="w-full h-48 object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-200 truncate">${music.title}</h3>
                                <p class="text-sm text-gray-400">${music.artist}</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="text-xs text-gray-500">${music.duration}</span>
                                    <button onclick="playMusic('${music.audio_url}')" 
                                            class="p-2 rounded-full bg-indigo-500 hover:bg-indigo-600 transition-colors duration-300">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `);
                });

                $('#searchResults').append(resultsGrid);
            } else {
                // Show no results message
                $('#searchResults').append(`
                    <div class="text-center py-8">
                        <p class="text-gray-400">No music found</p>
                    </div>
                `);
            }

            // Hide loading spinner
            $('#searchSpinner').addClass('hidden');
        }).fail(function(error) {
            console.error('Search failed:', error);
            $('#searchResults').html(`
                <div class="text-center py-8">
                    <p class="text-red-400">Error loading results. Please try again.</p>
                </div>
            `);
            $('#searchSpinner').addClass('hidden');
        });
    }

    $(document).ready(function() {
        loadMusic();

        // Debounced search on input
        $('#searchInput').on('input', function() {
            const query = $(this).val();
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                loadMusic(query);
            }, 300); // 300ms delay
        });

        // Handle filter buttons
        $('.filter-btn').on('click', function() {
            $('.filter-btn').removeClass('bg-indigo-500 text-white');
            $(this).addClass('bg-indigo-500 text-white');
            // Add filter logic here
        });
    });

    function playMusic(audioUrl) {
        // Implement your play music logic here
        console.log('Playing:', audioUrl);
    }
</script>
@endsection