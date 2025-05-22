<button id="toggleFooterBtn"
    class="fixed bottom-4 right-4 z-60 w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center shadow-lg hover:bg-blue-600 transition-all"
    style="display: none;" aria-label="Show Music Player">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 transform rotate-180" <!-- tambahkan transform rotate-180 -->
        fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10l4 4 4-4" />
    </svg>
</button>

<footer id="musicFooter"
    class="fixed bottom-0 left-0 right-0 bg-[#212121] text-gray-300 p-4 flex items-center justify-between space-x-4 shadow-lg z-50 transition-transform duration-300">

    <!-- filepath: c:\xampp\htdocs\vmp\resources\views\partials\footer.blade.php -->
    <!-- filepath: c:\xampp\htdocs\vmp\resources\views\partials\footer.blade.php -->
    <!-- filepath: c:\xampp\htdocs\vmp\resources\views\partials\footer.blade.php -->
    <!-- filepath: c:\xampp\htdocs\vmp\resources\views\partials\footer.blade.php -->
    <div class="flex items-center space-x-4 min-w-0 w-full">
        <img id="albumArt" alt="Album Art"
            class="w-12 h-12 rounded object-cover flex-shrink-0 shadow-md" />
        <div class="flex flex-col justify-center min-w-fit">
            <div id="trackTitle" class="font-semibold text-gray-100">
                <!-- History of Bad Decisions -->
            </div>
            <div class="text-gray-400 text-sm" id="trackArtist">
                <!-- Neck Deep -->
            </div>
        </div>
        <span class="text-gray-400 text-sm ml-2 whitespace-nowrap flex-shrink-0" id="trackDuration">0:00 / 0:00</span>
    </div>

    {{-- <button aria-label="Thumbs Up"
        class="ml-2 p-2 rounded-full hover:bg-green-600 hover:ring-2 hover:ring-green-400 shadow transition-all duration-300 ease-in-out group">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-400 group-hover:text-white"
            viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M2 20h2c.55 0 1-.45 1-1v-7c0-.55-.45-1-1-1H2v9zm20-8h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L15.17 5 8.59 11.59C8.22 11.95 8 12.45 8 13v6c0 .55.45 1 1 1h7c.39 0 .74-.23.91-.59l3.58-7.16c.08-.14.12-.3.12-.47v-1c0-.55-.45-1-1-1z" />
        </svg>
    </button>

    <button aria-label="Thumbs Down"
        class=" p-2 rounded-full hover:bg-red-600 hover:ring-2 hover:ring-red-400 shadow transition-all duration-300 ease-in-out group">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400 group-hover:text-white" viewBox="0 0 24 24"
            fill="currentColor">
            <path
                d="M22 4h-2c-.55 0-1 .45-1 1v7c0 .55.45 1 1 1h2V4zm-4 0H11c-.39 0-.74.23-.91.59L6.5 11.75c-.08.14-.12.3-.12.47v1c0 .55.45 1 1 1H14l-.95 4.57-.03.32c0 .41.17.79.44 1.06l1.06 1.06 6.58-6.59C21.78 14.05 22 13.55 22 13V7c0-.55-.45-1-1-1z" />
        </svg>
    </button> --}}
    </div>

    <!-- Progress Bar -->
    <div class="w-full flex justify-center">
        <div class="w-3/4 h-1 bg-gray-600 rounded">
            <div id="progressBar" class="h-full bg-blue-500 rounded" style="width: 0%;"></div>
        </div>
    </div>

    <div class="flex items-center space-x-3">
        <button onclick="prevTrack()" aria-label="Previous Track"
            class="w-8 h-8 rounded-full bg-[#35373f] shadow-neumorph hover:shadow-neumorph-glow flex items-center justify-center transition-transform hover:scale-110 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button onclick="togglePlayPause()" id="playPauseBtn" aria-label="Play/Pause"
            class="w-10 h-10 rounded-full bg-[#3f4150] shadow-neumorph hover:shadow-neumorph-glow flex items-center justify-center transition-transform hover:scale-110 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" id="playIcon" class="w-5 h-5 text-gray-200" fill="currentColor"
                viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" id="pauseIcon" class="w-5 h-5 text-gray-200 hidden" fill="none"
                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="6" y="5" width="4" height="14" rx="1" />
                <rect x="14" y="5" width="4" height="14" rx="1" />
            </svg>
        </button>

        <button onclick="nextTrack()" aria-label="Next Track"
            class="w-8 h-8 rounded-full bg-[#35373f] shadow-neumorph hover:shadow-neumorph-glow flex items-center justify-center transition-transform hover:scale-110 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <!-- Volume Control -->
    <div class="flex flex-col items-center relative">
        <div id="volumeControlContainer"
            class="absolute bottom-full mb-3 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center space-y-2 max-w-xs hidden">
            <div class="bg-[#23242b] rounded-xl shadow-lg px-4 py-3 border border-[#35373f] animate-fadeIn">
                <label for="volumeControl"
                    class="text-xs text-blue-300 font-semibold mb-2 block text-center tracking-wide"></label>
                <input id="volumeControl" type="range" min="0" max="1" step="0.01" value="1"
                    class="accent-[#63a4ff] cursor-pointer range-vertical transition-all duration-200" />
            </div>
        </div>
        <button id="volumeBtn" onclick="toggleVolumeControl()" aria-label="Volume Control"
            class="w-8 h-8 rounded-full bg-gradient-to-br from-[#35373f] to-[#23242b] shadow-neumorph hover:shadow-neumorph-glow flex items-center justify-center transition-transform hover:scale-110 focus:outline-none border border-[#444] hover:border-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-blue-300 group-hover:text-blue-400 transition-colors" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5L6 9H3v6h3l5 4V5z" /> <!-- Speaker body -->
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.54 8.46a5 5 0 0 1 0 7.07M19.07 4.93a9 9 0 0 1 0 14.14" /> <!-- Sound waves -->
            </svg>
        </button>
    </div>

    <!-- Collapse Button (panah ke bawah) -->
    <button id="collapseFooterBtn"
        class="ml-2 w-8 h-8 rounded-full bg-gray-700 text-white flex items-center justify-center hover:bg-gray-600 transition-all focus:outline-none"
        style="margin-left:8px;" aria-label="Sembunyikan Player">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10l4 4 4-4" />
        </svg>
    </button>

    <audio id="footerAudio"></audio>
</footer>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.25s ease;
    }

    .range-vertical {
        writing-mode: bt-lr;
        -webkit-appearance: slider-vertical;
        width: 10px;
        height: 110px;
        background: linear-gradient(180deg, #63a4ff 0%, #23242b 100%);
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(99, 164, 255, 0.15);
        margin: 0 auto;
    }

    .range-vertical::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #63a4ff;
        border: 2px solid #fff;
        box-shadow: 0 0 8px #63a4ff88;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .range-vertical:focus::-webkit-slider-thumb,
    .range-vertical:hover::-webkit-slider-thumb {
        transform: scale(1.2);
        box-shadow: 0 0 16px #63a4ffcc;
    }

    .range-vertical::-moz-range-thumb {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #63a4ff;
        border: 2px solid #fff;
        box-shadow: 0 0 8px #63a4ff88;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .range-vertical:focus::-moz-range-thumb,
    .range-vertical:hover::-moz-range-thumb {
        transform: scale(1.2);
        box-shadow: 0 0 16px #63a4ffcc;
    }

    .range-vertical::-ms-thumb {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #63a4ff;
        border: 2px solid #fff;
        box-shadow: 0 0 8px #63a4ff88;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .range-vertical:focus::-ms-thumb,
    .range-vertical:hover::-ms-thumb {
        transform: scale(1.2);
        box-shadow: 0 0 16px #63a4ffcc;
    }

    .range-vertical::-webkit-slider-runnable-track {
        background: transparent;
        border-radius: 8px;
    }

    .range-vertical::-ms-fill-lower,
    .range-vertical::-ms-fill-upper {
        background: transparent;
    }

    .range-vertical:focus {
        outline: none;
    }
</style>

<script>
    // const tracks = [{
    //     title: "History of Bad Decisions",
    //     artist: "Neck Deep • Up In Smoke",
    //     albumArt: "/assets/images/HistoryOfBadDecisions_NeckDeep.jpeg",
    //     src: "/assets/music/Neck Deep - Up In Smoke.mp3",
    //     duration: 240 // Duration in seconds
    // },
    // Additional tracks...
    // ];

    let currentTrackIndex = 0;
    let currentSong = null;
    const audio = document.getElementById('footerAudio');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const trackTitle = document.getElementById('trackTitle');
    const trackArtist = document.getElementById('trackArtist');
    const albumArt = document.getElementById('albumArt');
    const volumeControl = document.getElementById('volumeControl');
    const volumeControlContainer = document.getElementById('volumeControlContainer');
    const progressBar = document.getElementById('progressBar');
    const trackDuration = document.getElementById('trackDuration');

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
    }

function updateTrackInfo() {
    trackTitle.textContent = tracks[currentTrackIndex].title;
    trackArtist.textContent = tracks[currentTrackIndex].artist;
    albumArt.src = tracks[currentTrackIndex].albumArt;
    audio.src = tracks[currentTrackIndex].src;

    // Set sementara, total duration belum diketahui
    trackDuration.textContent = `0:00 / ...`;

    // Setelah metadata audio siap, tampilkan total duration sebenarnya
    audio.onloadedmetadata = function() {
        trackDuration.textContent = `0:00 / ${formatTime(audio.duration)}`;
    };
}

    function playTrack() {
        audio.play();
        document.getElementById("playIcon").classList.add("hidden");
        document.getElementById("pauseIcon").classList.remove("hidden");
    }

    function pauseTrack() {
        audio.pause();
        document.getElementById("playIcon").classList.remove("hidden");
        document.getElementById("pauseIcon").classList.add("hidden");
    }

    function togglePlayPause() {
        if (audio.paused) {
            playTrack();
        } else {
            pauseTrack();
        }
    }

    function nextTrack() {
    if (window.currentSong) {
        // Jika sedang play single song dari dashboard, kembali ke playlist
        window.currentSong = null;
        currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
        updateTrackInfo();
        playTrack();
    } else {
        currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
        updateTrackInfo();
        playTrack();
    }
}

function prevTrack() {
    if (window.currentSong) {
        // Jika sedang play single song dari dashboard, kembali ke playlist
        window.currentSong = null;
        currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
        updateTrackInfo();
        playTrack();
    } else {
        currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
        updateTrackInfo();
        playTrack();
    }
}

    volumeControl.addEventListener('input', () => {
        audio.volume = volumeControl.value;
    });

    function toggleVolumeControl() {
        volumeControlContainer.classList.toggle('hidden');
        if (!volumeControlContainer.classList.contains('hidden')) {
            setTimeout(() => {
                document.addEventListener('mousedown', handleClickOutsideVolume);
            }, 0);
        } else {
            document.removeEventListener('mousedown', handleClickOutsideVolume);
        }
    }

    function handleClickOutsideVolume(event) {
        const container = document.getElementById('volumeControlContainer');
        const btn = document.getElementById('volumeBtn');
        if (!container.contains(event.target) && !btn.contains(event.target)) {
            container.classList.add('hidden');
            document.removeEventListener('mousedown', handleClickOutsideVolume);
        }
    }

    updateTrackInfo();

    audio.addEventListener('ended', () => {
        nextTrack();
    });

audio.addEventListener('timeupdate', () => {
    const progressPercent = (audio.currentTime / audio.duration) * 100;
    progressBar.style.width = `${progressPercent}%`;
    
    // Hanya update jika duration valid
    if (!isNaN(audio.duration) && isFinite(audio.duration)) {
    trackDuration.textContent = `${formatTime(audio.currentTime)} / ${formatTime(audio.duration)}`;
    } else {
    trackDuration.textContent = `${formatTime(audio.currentTime)} / ...`;
    }
    });
    const progressBarWrapper = progressBar.parentElement;
    
    progressBarWrapper.addEventListener('click', function (e) {
    // Hitung posisi klik relatif terhadap lebar progress bar
    const rect = progressBarWrapper.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const percent = x / rect.width;
    // Set waktu audio sesuai persentase
    audio.currentTime = percent * audio.duration;
    });

    // --- Footer Show/Hide Logic ---
    const footer = document.getElementById('musicFooter');
    const toggleFooterBtn = document.getElementById('toggleFooterBtn');
    const collapseFooterBtn = document.getElementById('collapseFooterBtn');

    // Hide footer (collapse)
    function hideFooter() {
        footer.classList.add('hidden');
        toggleFooterBtn.style.display = 'flex';
    }

    // Show footer (expand)
    function showFooter() {
        footer.classList.remove('hidden');
        toggleFooterBtn.style.display = 'none';
    }

    collapseFooterBtn.addEventListener('click', hideFooter);
    toggleFooterBtn.addEventListener('click', showFooter);

    // Optional: Show footer by default, hide toggle button
    showFooter();
</script>