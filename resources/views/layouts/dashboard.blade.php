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
    @include('partials.nav')
    <div class="container">
        <div class="row">
            <!-- sidebar Here -->
            <div class="col-3">

            </div>

            <!-- Content Here -->
            <div class="main col-9">
                @yield('content')
            </div>
        </div>
    </div>



</body>

</html>
