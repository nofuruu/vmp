<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Music Player</title>
</head>

<body>
    @include('partials.navbar')

    @include('partials.sidebar')

    @include('partials.right-sidebar')

    <div class="container mt-4">
        @yield('content')
    </div>

    @include('partials.footer')
</body>

</html>