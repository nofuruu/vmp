<footer
    class="fixed bottom-0 left-0 right-0 bg-[#212121] text-gray-300 p-4 flex items-center justify-between space-x-4 shadow-lg z-50">

    <!-- Info musik yang sedang diputar -->
    <div class="flex items-center space-x-4 max-w-xs truncate">
        <img id="albumArt" src="/assets/images/HistoryOfBadDecisions_NeckDeep.jpeg" alt="Album Art"
            class="w-12 h-12 rounded object-cover flex-shrink-0" />
        <div class="truncate">
            <div id="trackTitle" class="font-semibold truncate text-gray-100">History of Bad Decisions</div>
            <div id="trackArtist" class="text-gray-400 text-sm truncate">Neck Deep</div>
        </div>
    </div>
    <div class="fixed bottom-2 left-1/2 transform -translate-x-1/2 z-50">
        <div class="flex items-center space-x-6">
            <button onclick="prevTrack()" aria-label="Previous Track"
                class="w-12 h-12 rounded-full bg-[#35373f] shadow-neumorph hover:shadow-neumorph-glow flex items-center justify-center transition-transform transform hover:scale-110 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button onclick="togglePlayPause()" id="playPauseBtn" aria-label="Play/Pause"
                class="w-14 h-14 rounded-full bg-[#3f4150] shadow-neumorph hover:shadow-neumorph-glow flex items-center justify-center transition-transform transform hover:scale-110 focus:outline-none position-fixed">
                <!-- Default play icon -->
                <svg xmlns="http://www.w3.org/2000/svg" id="playIcon" class="w-8 h-8 text-gray-200" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" />
                </svg>
                <!-- Pause icon hidden by default, toggle via JS -->
                <svg xmlns="http://www.w3.org/2000/svg" id="pauseIcon" class="w-8 h-8 text-gray-200 hidden" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="6" y="5" width="4" height="14" rx="1" />
                    <rect x="14" y="5" width="4" height="14" rx="1" />
                </svg>
            </button>

            <button onclick="nextTrack()" aria-label="Next Track"
                class="w-12 h-12 rounded-full bg-[#35373f] shadow-neumorph hover:shadow-neumorph-glow flex items-center justify-center transition-transform transform hover:scale-110 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
    <!-- Volume Control -->
    <div class="flex items-center space-x-2 max-w-xs">
        <label for="volumeControl" class="text-sm text-gray-400">Volume</label>
        <input id="volumeControl" type="range" min="0" max="1" step="0.01" value="1"
            class="w-24 accent-[#63a4ff] cursor-pointer" />
    </div>




</footer>

<style>
    /* Styling input range volume */
    input[type=range] {
        -webkit-appearance: none;
        width: 100%;
        height: 6px;
        background: #3f4150;
        border-radius: 3px;
        outline: none;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    input[type=range]:hover {
        background: #5361ff;
    }

    input[type=range]::-moz-range-track {
        background: #3f4150;
        border-radius: 3px;
    }

    input[type=range]:hover::-webkit-slider-thumb {
        transform: scale(1.3);
        box-shadow: 0 0 14px #7f9fff;
    }

    /* Thumb for Firefox */
    input[type=range]::-moz-range-thumb {
        width: 20px;
        height: 20px;
        background: #63a4ff;
        border-radius: 50%;
        box-shadow: 0 0 8px #63a4ff;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    input[type=range]:hover::-moz-range-thumb {
        transform: scale(1.3);
        box-shadow: 0 0 14px #7f9fff;
    }
</style>

<script>
    // Untuk sementara (belum menggunakan database)>
    const tracks = [{
            title: "History of Bad Decisions",
            artist: "Neck Deep • Up In Smoke",
            albumArt: "/assets/images/HistoryOfBadDecisions_NeckDeep.jpeg",
            src: "/assets/music/Neck Deep - Up In Smoke.mp3"
        },
        {
            title: "Rain In July",
            artist: "Neck Deep • A Part of Me (Ft. Laura Whiteside)",
            albumArt: "/assets/images/RainInJuly_NeckDeep.jpeg",
            src: "/assets/music/Neck Deep - A Part of Me (Ft. Laura Whiteside) Official Music Video.mp3"
        },
        {
            title: "Life’s Not Out to Get You",
            artist: "Neck Deep • I Hope This Comes Back to Haunt You",
            albumArt: "/assets/images/LifeNotOutToGetYou_NeckDeep.jpeg",
            src: "/assets/music/Neck Deep - I Hope This Comes Back To Haunt You.mp3"
        },
        {
        title: "The Peace and the Panic",
        artist: "Neck Deep • Heavy Lies",
        albumArt: "/assets/images/ThePeaceandThePanic_NeckDeep.jpeg",
        src: "/assets/music/Neck Deep - Heavy Lies.mp3"
        },
        {
        title: "The Peace and the B-sides",
        artist: "Neck Deep • Beautiful Madness",
        albumArt: "/assets/images/ThePeaceandTheBsides.jpeg",
        src: "/assets/music/Neck Deep - Beautiful Madness.mp3"
        },
    ];

    let currentTrackIndex = 0;
    const audio = new Audio(tracks[currentTrackIndex].src);
    const playPauseBtn = document.getElementById('playPauseBtn');
    const trackTitle = document.getElementById('trackTitle');
    const trackArtist = document.getElementById('trackArtist');
    const albumArt = document.getElementById('albumArt');
    const volumeControl = document.getElementById('volumeControl');

    function updateTrackInfo() {
        trackTitle.textContent = tracks[currentTrackIndex].title;
        trackArtist.textContent = tracks[currentTrackIndex].artist;
        albumArt.src = tracks[currentTrackIndex].albumArt;
        audio.src = tracks[currentTrackIndex].src;
    }

    function playTrack() {
        audio.play();
        playPauseBtn.innerHTML = "&#10074;&#10074;"; 
    }

    function pauseTrack() {
        audio.pause();
        playPauseBtn.innerHTML = "&#9654;"; 
    }

    function togglePlayPause() {
        if (audio.paused) {
            playTrack();
        } else {
            pauseTrack();
        }
    }

    function nextTrack() {
        currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
        updateTrackInfo();
        playTrack();
    }

    function prevTrack() {
        currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
        updateTrackInfo();
        playTrack();
    }

    volumeControl.addEventListener('input', () => {
        audio.volume = volumeControl.value;
    });

    updateTrackInfo();

    audio.addEventListener('ended', () => {
        nextTrack();
    });
</script>