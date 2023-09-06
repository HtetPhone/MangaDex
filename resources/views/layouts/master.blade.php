<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'MangaDex') }}</title>

    <!-- Css -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- Header Here -->
    @include('partials.nav')
    @include('partials.patreon-nav')

    <!-- Content Here -->
    <div class="main container">
        @yield('content')
    </div>
    @include('partials.alert-msg')

    @yield('footer')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>

</html>
