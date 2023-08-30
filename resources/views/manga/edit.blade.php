@extends('layouts.app')

@section('content')
    <a href="{{route('manga.index')}}" class="btn btn-dark"> <i class="bi bi-house-heart-fill"></i> Home</a>
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
            <label for="">Manga Cover</label>
            <img src="{{ $manga->cover ? asset($manga->cover) : null }}" class="w-50 d-block my-3" alt="">
            <input type="file" name="cover" id="" class="form-control">
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


