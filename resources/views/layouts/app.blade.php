<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | VMP </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.3/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<body class="bg-[#24252a] text-white">
    @include('partials.sidebar')

    @include('partials.right-sidebar')

    <div id="mainContent" class="main-content transition-all duration-300"
        style="padding-left: 16rem; padding-top: 4.5rem;">
        @yield('content')
    </div>

    @include('partials.footer')
</body>
</html>