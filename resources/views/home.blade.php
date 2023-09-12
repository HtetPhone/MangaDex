@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}

            <h5 class="text-primary fw-semibold mt-3"> <i class="bi bi-arrow-through-heart-fill"></i> Statistics</h5>
            <p>Authors : <span class="text-success">{{ $authors->count() }} {{ Str::plural('author', $authors->count())}} </span></p>
            <p>Users : <span class="text-success">{{ $users->count() }} {{ Str::plural('user', $authors->count()) }}</span> </p>
            <p>Comics : <span class="text-success">{{ $mangas->count() }} {{ Str::plural('comic', $mangas->count()) }}</span> </p>
        </div>
    </div>
@endsection
