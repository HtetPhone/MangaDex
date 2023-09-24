@extends('layouts.app')

@section('content')
    <a href="{{ route('manga.index') }}" class="btn btn-dark"> <i class="bi bi-house-heart-fill"></i> Home</a>
    <hr>
    <h5 class="fw-semibold">Editing Manga</h5>
    <hr>
    <form method="POST" action="{{ route('manga.update', $manga->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Manga Title</label>
            <input type="text" name="title" class="form-control" value="{{ $manga->title ?? old('title') }}">
            @error('title')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>Genres</label>
            <div>
                @foreach (App\Models\Genre::all() as $genre)
                    <input type="checkbox" name="genres[]" id="{{ $genre->id }}" value="{{ $genre->id }}"
                        {{ $manga->genres->contains('id', $genre->id) ? 'checked' : '' }}>
                    <label for="{{ $genre->id }}"> {{ $genre->name }} </label>
                @endforeach
            </div>
            @error('genres')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Manga Cover</label>
            <img src="{{ asset('storage/' . $manga->cover) }}" class="img-fluid d-block my-3" alt="">
            <input type="file" name="cover" id="" class="form-control">
            @error('cover')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Manga Summary</label>
            <textarea name="summary" id="" cols="30" rows="6" class="form-control p-3"
                placeholder="Write A Summary">
                {{ $manga->summary ?? old('summary') }}
            </textarea>
            @error('summary')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-outline-dark">Update</button>
    </form>
@endsection


{{-- @section('footer')
    @include('components.footer')
@endsection --}}
