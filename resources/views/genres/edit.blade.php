@extends('layouts.app')
@section('content')
    <x-card-card-body>
        <h5 class="text-primary"> <i class="bi bi-pencil-square"></i> Edit Genre </h5>
        <hr>
        <form method="POST" action="{{ route('genres.update', $genre) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="">Genre Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $genre->name)}}">
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-dark">Update</button>
        </form>
    </x-card-card-body>
@endsection
