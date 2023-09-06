@extends('layouts.app')

@section('content')
    <div class="px-3 mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
        <hr>
        <div class="">
            <h3 class="my-3"> Title : <span class="fw-semibold  ">{{ $manga->title }}</span> </h3>
            <hr>
            <p class="f">Cover Image :</p>
            <div class="text-center mb-4">
                <img class="w-25" src="{{ asset('storage/'.$manga->cover) }}" alt="">
            </div>
            <hr>
            <p class="mb-0">Summary :</p>
            <p class="text-black-50 small"> {{ $manga->summary }} </p>

            <div class="d-flex justify-content-between">
                <p>Total Chapter : <span class="text-primary fw-semibold">{{$manga->chapters->count()}} chapters</span> </p>
                <div>
                    <a href="{{route('chapters.manage', $manga->slug)}}" class="btn btn-outline-dark btn-sm">Go Manage Chapters <i class="bi bi-arrow-right-circle-fill"></i> </a>
                </div>
            </div>

            <hr>
        </div>
    </div>
@endsection
