@extends('layouts.master')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
    <div>
        <div class="text-center">
            <img class="w-25" src="{{ $manga->cover ? asset( $manga->cover) : '' }}" alt="">
        </div>
        <h3 class="text-center my-3">{{ $manga->title }}</h3>
        <p> {{ $manga->summary }} </p>
        <ul class="list-group my-3 mt-5 text-center w-50 mx-auto">
            <h5 class="fw-bold mb-3">
                Chapters
            </h5>
            @forelse ($manga->chapters()->latest('id')->get() as $chapter)
                <a href="{{ route('page.chapter', [$manga->slug, $chapter->id]) }}" class="list-group-item list-group-item-action">
                    {{ $chapter->title }}
                </a>
            @empty
                <p class="text-danger">No Chapter Yet!</p>
            @endforelse
        </ul>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
