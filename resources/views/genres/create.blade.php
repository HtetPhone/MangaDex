@extends('layouts.app')
@section('content')
    <x-card-card-body>
        <form method="POST" action="{{ route('genres.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
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
