@extends('layouts.master')
@section('content')
    <h3 class="fw-semibold my-4"> {{ $manga->title }} - {{ $chapter->title }} </h3>
    <div class="text-center mx-auto my-5">

        @include('partials.chapter-breadcrumb')


        <div class="my-4 d-flex justify-content-between">
            @include('partials.chapter-select-box')
            @include('partials.chapter-paginate')
        </div>

        {{-- manga images  --}}
        <div class="mb-4">
            @foreach ($chapter->images as $image)
                <img src="{{ asset('storage/'.$image) }}" class="mx-auto w-50 my-0" alt="">
            @endforeach
        </div>

        <hr>

        <div class="my-4 d-flex justify-content-between">
            @include('partials.chapter-select-box')
            @include('partials.chapter-paginate')
        </div>
        
    </div>
@endsection
