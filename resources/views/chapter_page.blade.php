@extends('layouts.master')
@section('content')
    <h3 class="fw-semibold my-4"> {{ $manga->title }} - {{ $chapter->title }} </h3>
    <div class="text-center mx-auto my-5">

        {{-- breadcrumb  --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-decoration-none"><a href="{{ route('page.index') }}">Home</a></li>
                <li class="breadcrumb-item text-decoration-none"><a href="{{ route('page.manga', $manga->slug) }}">
                        {{ $manga->title }} </a></li>
                <li class="breadcrumb-item active" aria-current="page">Chapter {{ $chapter->id }} </li>
            </ol>
        </nav>

        {{-- select box and paginate  --}}
        <div class="my-4 d-flex justify-content-between">
            <div class="col-4">
                <select name="" id="" class="form-select bg-dark text-white">
                    @foreach ($manga->chapters()->latest('id')->get() as $chap)
                        <option value="{{ $chap->id }}" {{ $chap->id == $chapter->id ? 'selected' : '' }}>
                            {{ $chap->title }} </option>
                    @endforeach
                </select>
            </div>
            <div>
                <a href="" class="btn btn-dark btn-small">Previous</a>
                <a href="" class="btn btn-dark btn-small">Next</a>
            </div>
        </div>

        {{-- manga images  --}}
        <div class="mb-4">
            @foreach ($chapter->images as $image)
                <img src="{{ asset($image) }}" class="mx-auto w-50 my-0" alt="">
            @endforeach
        </div>

        <hr>
        {{-- chapters and pagiantion   --}}
        <div class="my-5 d-flex justify-content-between">
            <div class="col-4">
                <select name="" id="" class="form-select bg-dark text-white">
                    @foreach ($manga->chapters()->latest('id')->get() as $chap)
                        <option value="{{ $chap->id }}" {{ $chap->id == $chapter->id ? 'selected' : '' }}>
                            {{ $chap->title }} </option>
                    @endforeach
                </select>
            </div>
            <div>
                <a href="" class="btn btn-dark btn-small">Previous</a>
                <a href="" class="btn btn-dark btn-small">Next</a>
                {{-- {{ $allChap->links() }} --}}
            </div>
        </div>
    </div>
@endsection
