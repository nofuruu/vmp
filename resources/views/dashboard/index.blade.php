@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Albums for you</h2>

    <!-- Panah Next & Previous -->
    <div class="flex items-center gap-2 mb-2">
        <button onclick="scrollToLeft()"
            class="bg-gray-700 hover:bg-gray-600 text-white px-2 py-1 rounded">&larr;</button>
        <button onclick="scrollToRight()"
            class="bg-gray-700 hover:bg-gray-600 text-white px-2 py-1 rounded">&rarr;</button>
    </div>

    <!-- Album list -->
    <div class="overflow-x-auto scrollbar-hide cursor-grab" id="albumScroll">
        <div class="flex gap-6">
            @foreach ($albums as $album)
            <div class="w-40 flex-shrink-0">
                <img class="w-40 h-40 object-cover rounded-lg mb-2" src="{{ $album['image'] }}"
                    alt="{{ $album['title'] }}">
                <div class="text-sm font-semibold truncate">{{ $album['title'] }}</div>
                <div class="text-xs text-gray-500 truncate">Album • {{ $album['artist'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    const slider = document.getElementById('albumScroll');

    let isDown = false;
    let startX;
    let scrollX;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('cursor-grabbing');
        startX = e.pageX - slider.offsetLeft;
        scrollX = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('cursor-grabbing');
    });

    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('cursor-grabbing');
    });

    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 2;
        slider.scrollLeft = scrollX - walk;
    });

    function scrollToLeft() {
        slider.scrollBy({
            left: -200,
            behavior: 'smooth'
        });
    }

    function scrollToRight() {
        slider.scrollBy({
            left: 200,
            behavior: 'smooth'
        });
    }
</script>
@endsection