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

        <!-- Content Here -->
        <div class="main container">
            @yield('content')
        </div>



</body>

</html>
