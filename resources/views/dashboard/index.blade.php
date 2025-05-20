@extends('layouts.app')

@section('title', 'VMP | Dashboard')

@section('content')
<div class="p-4 grid grid-cols-1 md:grid-cols-4 gap-4">
    <!-- Bagian Kiri: Album -->
    <div class="md:col-span-3 flex flex-col gap-8">

        <!-- Kumpulan Album -->
        <div>
            <h2 class="text-2xl font-bold mb-4">Kumpulan Album</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6" id="albumCollection">
                <!-- Album akan di-render oleh JS -->
            </div>
        </div>

        <!-- Albums for you (semua lagu / hasil filter genre) -->
        <div>
            <h2 id="albumTitle" class="text-2xl font-bold mb-4"></h2>
            <div class="flex items-center gap-2 mb-2">
                <button onclick="scrollToLeft('albumScroll')"
                    class="bg-gray-700 hover:bg-gray-600 text-white px-2 py-1 rounded">&larr;</button>
                <button onclick="scrollToRight('albumScroll')"
                    class="bg-gray-700 hover:bg-gray-600 text-white px-2 py-1 rounded">&rarr;</button>
            </div>
            <div class="overflow-x-auto scrollbar-hide cursor-grab mb-8" id="albumScroll">
                <!-- isi di‐render oleh JS -->
            </div>
        </div>

        <!-- Album Terbaru -->
        <div class="" id="albumBaruWrapper">
            <h2 class="text-2xl font-bold mb-4">Album Terbaru</h2>
            <div class="overflow-x-auto scrollbar-hide cursor-grab" id="albumScrollBaru">
                <!-- isi di‐render oleh JS -->
            </div>
        </div>

        <!-- Album Terlama -->
        <div id="albumLamaWrapper">
            <h2 class="text-2xl font-bold mb-4">Album Terlama</h2>
            <div class="overflow-x-auto scrollbar-hide cursor-grab" id="albumScrollLama">
                <!-- isi di‐render oleh JS -->
            </div>
        </div>

    </div>

    <!-- Bagian Kanan: Genre -->
    <div class="bg-[#24252a] p-6 rounded-lg shadow-xl">
        <h3 id="genreTitle" class="text-xl font-semibold mb-6 text-gray-200 tracking-wide mr-auto"
            style="margin-left: 75px; transition: margin-left 0.3s;">
            Genre
        </h3>
        <ul class="grid grid-cols-2 gap-4 max-h-96 overflow-y-auto scrollbar-hide" id="genreList">
            @foreach ($genres as $genre)
            <li class="bg-[#2e2f35] border border-gray-700 text-gray-300 hover:bg-gray-700 hover:border-gray-500 hover:text-white
                           rounded-lg px-5 py-3 cursor-pointer transition duration-250 ease-in-out flex items-center justify-center font-medium shadow-sm"
                data-genre="{{ $genre->name }}">
                {{ $genre->name }}
            </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Modal Album -->
<div id="albumModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-[#24252a] rounded-lg p-6 max-w-2xl w-full mx-4 max-h-[80vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center gap-4">
                <img id="modalAlbumArt" class="w-20 h-20 rounded-full object-cover" src="" alt="">
                <div>
                    <h3 id="modalAlbumTitle" class="text-xl font-bold text-white"></h3>
                    <p id="modalAlbumArtist" class="text-gray-400"></p>
                </div>
            </div>
            <button onclick="closeAlbumModal()" class="text-gray-400 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div id="albumSongsList" class="space-y-2">
            <!-- Lagu-lagu akan di-render oleh JS -->
        </div>
    </div>
</div>


<script>
    const API_BASE = 'http://10.21.1.27:8000/api';
        let activeGenre = null;

        // Fetch semua lagu
        async function fetchAllSongs() {
            const res = await fetch(`${API_BASE}/songs`);
            if (!res.ok) throw new Error('Gagal mem-fetch songs');
            return res.json();
        }

        // Fetch lagu berdasarkan genre
        async function fetchSongsByGenre(genre) {
            const res = await fetch(`${API_BASE}/songs?genre=${encodeURIComponent(genre)}`);
            if (!res.ok) throw new Error('Gagal mem-fetch songs by genre');
            return res.json();
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
                            document.getElementById('albumTitle').textContent =
                                `Lagu dengan genre ${genre}`;
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
                            alert('Gagal memuat lagu genre ' + genre);
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
            container.innerHTML = `<div class="flex gap-6"></div>`;
            const row = container.querySelector('.flex');
            songs.forEach(song => {
                const card = document.createElement('div');
                card.className = 'w-40 flex-shrink-0 cursor-pointer';
                card.innerHTML = `
                <img class="w-40 h-40 object-cover rounded-lg mb-2"
                    src="${song.cover_url}"
                    alt="${song.title}">
                <div class="text-sm font-semibold truncate">${song.title}</div>
                <div class="text-xs text-gray-500 truncate">Album • ${song.artist}</div>
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