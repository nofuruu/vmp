@extends('layouts.app')

@section('title', 'VMP | Dashboard')

@section('content')

<style>
    body {
        overflow-x: hidden;
    }
</style>
<div class="p-6 space-y-8">
    <!-- Header Section with Genre Filter -->
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-100">Your Music</h1>
        <div class="relative">
            <button id="genreBtn"
                class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-[#2e2f35] hover:bg-[#3a3b42] text-gray-200 hover:text-white border border-gray-600 transition-all duration-300 ease-in-out shadow-lg font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                </svg>
                Filter by Genre
            </button>

            <!-- Genre Popover -->
            <div id="genreContainer"
                class="absolute right-0 mt-2 z-50 bg-[#24252a] p-6 rounded-2xl shadow-2xl w-80 transition-all duration-300"
                style="display: none;">
                <h3 id="genreTitle" class="text-lg font-semibold mb-4 text-gray-200 tracking-wide text-center">
                    Genre
                </h3>
                <ul class="grid grid-cols-2 gap-3 max-h-80 overflow-y-auto scrollbar-hide" id="genreList">
                    @foreach ($genres as $genre)
                    <li class="bg-[#2e2f35] border border-gray-700 text-gray-300 hover:bg-gray-700 hover:border-gray-500 hover:text-white
               rounded-lg px-4 py-2 cursor-pointer transition duration-200 ease-in-out flex items-center justify-center font-medium shadow-sm"
                        data-genre="{{ $genre->name }}">
                        {{ $genre->name }}
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- Featured Albums Grid -->
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6" id="albumCollection">
    <!-- Albums will be rendered here by JS -->
</div>

<!-- Recent Releases -->
<div class="space-y-4" id="albumBaruWrapper">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-100">Recent Releases</h2>
        <div class="flex gap-2">
            <button onclick="scrollToLeft('albumScrollBaru')"
                class="p-2 rounded-full bg-[#2e2f35] hover:bg-[#3a3b42] text-gray-300 transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button onclick="scrollToRight('albumScrollBaru')"
                class="p-2 rounded-full bg-[#2e2f35] hover:bg-[#3a3b42] text-gray-300 transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
    <div class="overflow-x-auto scrollbar-hide" id="albumScrollBaru">
        <!-- Recent albums will be rendered here -->
    </div>
</div>

<!-- Genre-based Recommendations/recently played(soon) --> 
<div class="space-y-4 mt-5" id="genreBasedSection">
    <div class="flex justify-between items-center">
        <h2 id="albumTitle" class="text-2xl font-bold text-gray-100 mt-5"></h2>
        <div class="flex gap-2">
            <button onclick="scrollToLeft('albumScroll')"
                class="p-2 rounded-full bg-[#2e2f35] hover:bg-[#3a3b42] text-gray-300 transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button onclick="scrollToRight('albumScroll')"
                class="p-2 rounded-full bg-[#2e2f35] hover:bg-[#3a3b42] text-gray-300 transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
    <div class="relative overflow-x-auto scrollbar-hide" id="albumScroll">
        <div class="flex gap-4 py-2">
            <!-- Genre-based recommendations will be rendered here -->
        </div>
    </div>
</div>

<!-- Classic Albums -->
<div class="space-y-4 mt-5" id="albumLamaWrapper">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-100 mt-5">Classic Albums</h2>
        <div class="flex gap-2">
            <button onclick="scrollToLeft('albumScrollLama')"
                class="p-2 rounded-full bg-[#2e2f35] hover:bg-[#3a3b42] text-gray-300 transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button onclick="scrollToRight('albumScrollLama')"
                class="p-2 rounded-full bg-[#2e2f35] hover:bg-[#3a3b42] text-gray-300 transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
    <div class="overflow-x-auto scrollbar-hide" id="albumScrollLama">
        <!-- Classic albums will be rendered here -->
    </div>
</div>
</div>
<script>
    const API_BASE = 'http://10.21.1.125:8000/api';
    let activeGenre = null;


    document.addEventListener('DOMContentLoaded', () => {
        const genreBtn = document.getElementById('genreBtn');
        const genreContainer = document.getElementById('genreContainer');

        genreBtn.addEventListener('click', () => {
            genreContainer.style.display = genreContainer.style.display === 'none' ? 'block' : 'none';
        });

        document.addEventListener('click', function(e) {
            if (!genreContainer.contains(e.target) && !genreBtn.contains(e.target)) {
                genreContainer.style.display = 'none';
            }
        });
    });

    // Fetch semua lagu
    async function fetchAllSongs() {
        const res = await fetch(`${API_BASE}/songs`);
        if (!res.ok) throw new Error('Gagal mem-fetch songs');
        return res.json();
    }

    // Fetch lagu berdasarkan genre
    async function fetchSongsByGenre(genre) {
        try {
            const res = await fetch(`${API_BASE}/songs?genre=${encodeURIComponent(genre)}`);
            if (!res.ok) {
                throw new Error(`HTTP error! status: ${res.status}`);
            }
            const data = await res.json();
            if (!data || !Array.isArray(data)) {
                throw new Error('Invalid data format received');
            }
            return data;
        } catch (error) {
            console.error('fetchSongsByGenre error:', error);
            throw error; // Re-throw to be caught by the caller
        }
    }

    // Event klik genre
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('#genreList li[data-genre]').forEach(li => {
            li.addEventListener('click', async () => {
                const genre = li.getAttribute('data-genre');
                if (activeGenre === genre) {
                    activeGenre = null;
                    document.getElementById('albumTitle').textContent = "";
                    const all = await fetchAllSongs();
                    const sortedByDateAsc = [...all].sort((a, b) => new Date(a.created_at) -
                        new Date(b.created_at));
                    const sortedByDateDesc = [...sortedByDateAsc].reverse();
                    renderCarousel(all, 'albumScroll');
                    renderCarousel(sortedByDateDesc, 'albumScrollBaru');
                    renderCarousel(sortedByDateAsc, 'albumScrollLama');
                    document.getElementById('albumBaruWrapper').style.display = '';
                    document.getElementById('albumLamaWrapper').style.display = '';
                    document.querySelectorAll('#genreList li[data-genre]').forEach(el => el
                        .classList.remove('bg-gray-700', 'text-white'));
                } else {
                    activeGenre = genre;
                    try {
                        const songs = await fetchSongsByGenre(genre);
                        if (songs.length === 0) {
                            iziToast.info({
                                message: 'No songs found for genre ' + genre,
                                position: 'topRight',
                                timeout: 3000,
                            });
                            return;
                        }
                        document.getElementById('albumTitle').textContent = `Lagu dengan genre ${genre}`;
                        renderCarousel(songs, 'albumScroll');
                        document.getElementById('albumScroll').scrollIntoView({
                            behavior: 'smooth'
                        });
                        document.getElementById('albumBaruWrapper').style.display = 'none';
                        document.getElementById('albumLamaWrapper').style.display = 'none';
                        document.querySelectorAll('#genreList li[data-genre]').forEach(el =>
                            el.classList.remove('bg-gray-700', 'text-white'));
                        li.classList.add('bg-gray-700', 'text-white');
                    } catch (err) {
                        console.error('Genre filter error:', err);
                        iziToast.success({
                            message: 'Songs for genre ' + genre,
                            position: 'topRight',
                            timeout: 3000,
                        });
                    }
                }
            });
        });
    });

    // Saat halaman pertama kali dibuka, tampilkan semua lagu dan tampilkan Album Terbaru & Terlama
    (async () => {
        try {
            const all = await fetchAllSongs();
            const sortedByDateAsc = [...all].sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
            const sortedByDateDesc = [...sortedByDateAsc].reverse();

            document.getElementById('albumTitle').textContent = "";
            renderCarousel(all, 'albumScroll');
            renderCarousel(sortedByDateDesc, 'albumScrollBaru');
            renderCarousel(sortedByDateAsc, 'albumScrollLama');

            // Tampilkan Album Terbaru & Terlama
            document.getElementById('albumBaruWrapper').style.display = '';
            document.getElementById('albumLamaWrapper').style.display = '';
        } catch (err) {
            console.error(err);
        }
    })();

    // Render carousel
    function renderCarousel(songs, containerId) {
        const container = document.getElementById(containerId);
        container.innerHTML = `<div class="flex gap-6 py-2"></div>`;
        const row = container.querySelector('.flex');

        songs.forEach(song => {
            const card = document.createElement('div');
            card.className = 'group w-48 flex-shrink-0 cursor-pointer transition-transform duration-300 hover:scale-105';
            card.innerHTML = `
            <div class="relative overflow-hidden rounded-xl aspect-square mb-3">
                <img class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110"
                     src="${song.cover_url}"
                     alt="${song.title}">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 flex items-center justify-center">
                    <button class="w-12 h-12 rounded-full bg-indigo-500 text-white opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="space-y-1 px-2">
                <div class="font-semibold text-gray-100 truncate">${song.title}</div>
                <div class="text-sm text-gray-400 truncate">${song.artist}</div>
            </div>
        `;
            card.onclick = () => playSelectedTrack(song);
            row.appendChild(card);
        });
    }

    // Play track
    function playSelectedTrack(song) {
        const audio = document.getElementById('footerAudio');
        audio.src = song.audio_url;
        audio.play();

        document.getElementById('trackTitle').textContent = song.title;
        document.getElementById('trackArtist').textContent = song.artist;
        document.getElementById('albumArt').src = song.cover_url;
        if (document.getElementById('trackDuration')) {
            let duration = song.duration || 0;
            if (typeof duration === 'string' && duration.includes(':')) {
                const parts = duration.split(':');
                duration = parseInt(parts[0], 10) * 60 + parseInt(parts[1], 10);
            } else {
                duration = parseInt(duration, 10) || 0;
            }
            const minutes = Math.floor(duration / 60);
            const secs = Math.floor(duration % 60);
            document.getElementById('trackDuration').textContent = `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
        }
        document.getElementById("playIcon").classList.add("hidden");
        document.getElementById("pauseIcon").classList.remove("hidden");
        document.getElementById('musicFooter').classList.remove('hidden');
        document.getElementById('toggleFooterBtn').style.display = 'none';

        window.currentSong = song;
    }

    // Scroll helpers
    function scrollToLeft(id) {
        document.getElementById(id).scrollBy({
            left: -200,
            behavior: 'smooth'
        });
    }

    function scrollToRight(id) {
        document.getElementById(id).scrollBy({
            left: 200,
            behavior: 'smooth'
        });
    }

    async function fetchAlbums() {
        const res = await fetch(`${API_BASE}/albums`);
        if (!res.ok) throw new Error('Gagal mem-fetch albums');
        return res.json();
    }

    // Render album collection
    async function renderAlbumCollection() {
        try {
            const albums = await fetchAlbums();
            const container = document.getElementById('albumCollection');
            container.innerHTML = '';

            albums.forEach(album => {
                const albumElement = document.createElement('div');
                albumElement.className =
                    'flex flex-col items-center gap-2 cursor-pointer transform hover:scale-105 transition-transform duration-200';
                albumElement.innerHTML = `
                    <div class="w-full aspect-square relative">
                        <img src="${album.cover_url}" 
                             alt="${album.title}"
                             class="w-full h-full object-cover rounded-full shadow-lg">
                    </div>
                    <h3 class="text-center font-medium text-sm truncate w-full">${album.title}</h3>
                    <p class="text-center text-gray-500 text-xs truncate w-full">${album.artist}</p>
                `;
                albumElement.onclick = () => openAlbumModal(album);
                container.appendChild(albumElement);
            });
        } catch (err) {
            console.error('Error loading albums:', err);
        }
    }

    // Fungsi untuk membuka modal album
    async function openAlbumModal(album) {
        try {
            const songs = await fetchSongsByAlbum(album.id);
            const modal = document.getElementById('albumModal');
            const modalAlbumArt = document.getElementById('modalAlbumArt');
            const modalAlbumTitle = document.getElementById('modalAlbumTitle');
            const modalAlbumArtist = document.getElementById('modalAlbumArtist');
            const songsList = document.getElementById('albumSongsList');

            modalAlbumArt.src = album.cover_url;
            modalAlbumTitle.textContent = album.title;
            modalAlbumArtist.textContent = album.artist;

            songsList.innerHTML = '';
            songs.forEach((song, index) => {
                const songElement = document.createElement('div');
                songElement.className =
                    'flex items-center justify-between p-3 hover:bg-gray-700 rounded-lg cursor-pointer';
                songElement.innerHTML = `
                    <div class="flex items-center gap-4">
                        <span class="text-gray-400 w-6">${index + 1}</span>
                        <div>
                            <div class="font-medium">${song.title}</div>
                            <div class="text-sm text-gray-400">${song.artist}</div>
                        </div>
                    </div>
                    <div class="text-sm text-gray-400">${formatDuration(song.duration)}</div>
                `;
                songElement.onclick = () => playSelectedTrack(song);
                songsList.appendChild(songElement);
            });

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } catch (err) {
            console.error('Error opening album:', err);
        }
    }

    // Fungsi untuk menutup modal album
    function closeAlbumModal() {
        const modal = document.getElementById('albumModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Fungsi untuk fetch lagu-lagu dalam album
    async function fetchSongsByAlbum(albumId) {
        const res = await fetch(`${API_BASE}/albums/${albumId}/songs`);
        if (!res.ok) throw new Error('Gagal mem-fetch songs dari album');
        return res.json();
    }

    // Format durasi lagu
    function formatDuration(duration) {
        if (typeof duration === 'string' && duration.includes(':')) {
            return duration;
        }
        const minutes = Math.floor(duration / 60);
        const seconds = Math.floor(duration % 60);
        return `${minutes}:${seconds.toString().padStart(2, '0')}`;
    }

    // Panggil render album collection saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        renderAlbumCollection();
        // ... event listener lainnya tetap sama ...
    });

    // Tutup modal ketika mengklik di luar modal
    document.getElementById('albumModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('albumModal')) {
            closeAlbumModal();
        }
    });
</script>
@endsection