@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('chapter.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Choose Manga</label>
            <select name="manga_id" id="" class="form-select">
                <option>Select Manga</option>
                @foreach (App\Models\Manga::latest('id')->get() as $manga)
                    <option value="{{$manga->id}}" {{ $manga->id == request()->manga_id ? 'selected' : ''}}> {{$manga->title}} </option>
                @endforeach
            </select>
            @error('manga_id')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Chapter Title <span class="text-danger">*Optinal</span></label>
            <input type="text" name="title" class="form-control">
            @error('title')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Chapter Images</label>
            <input type="file" name="images[]" id="" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-outline-dark">Create</button>
    </form>
@endsection
