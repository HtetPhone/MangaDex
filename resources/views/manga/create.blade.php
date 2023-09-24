@extends('layouts.app')
@section('content')
    <x-card-card-body>
        <form method="POST" action="{{ route('manga.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Manga Title</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                @error('title')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Manga Cover</label>
                <input type="file" name="cover" id="" class="form-control">
                @error('cover')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="d-block" for="">Genres</label>
                @forelse ($genres as $genre)
                    <span class="me-2">
                        <input class="" type="checkbox" name="genres[]" value="{{$genre->id}}" id="{{ $genre->id }}">
                        <label for="{{ $genre->id }}"> {{ $genre->name }}</label>
                    </span>
                @empty
                @endforelse
                @error('genres')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Manga Summary</label>
                <textarea name="summary" id="" cols="30" rows="6" class="form-control p-3"
                    placeholder="Write A Summary">
                    {{old('summary')}}
                </textarea>
                @error('summary')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-dark">Create</button>
        </form>
    </x-card-card-body>
@endsection

