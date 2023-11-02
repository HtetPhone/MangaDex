@extends('layouts.app')
@section('content')
    <x-card-card-body>
        <form method="POST" action="{{ route('genres.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <h3>Create Your Genres Here</h3>
                    <a href="{{route('genres.index')}}" class="btn btn-primary">Go see Genre List</a>
                </div> <hr>
                <label for="">Genre Name</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-dark">Create</button>
        </form>
    </x-card-card-body>
@endsection
