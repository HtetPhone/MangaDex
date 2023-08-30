@extends('layouts.master')


@section('content')
    <div class="row mt-5">
        <div class="col-12 col-md-9">
            <div class="row flex-wrap">
                @foreach ($mangas as $manga)
                    <div class="col-6 col-md-3">
                        <div class="card border-0">
                            <div class="text-center">
                                <a href="{{ route('page.manga', $manga->slug) }}">
                                    <img src="{{ asset( $manga->cover ) }}" alt="img"
                                        class="w-100">
                                </a>
                            </div>
                            <div class="mt-2">
                                <h5 class="fw-semibold "> {{ $manga->title }} </h5>
                                @forelse ($manga->chapters()->latest('id')->limit(2)->get() as $chapter)
                                    <a href="{{ route('page.chapter', [$chapter->manga->slug, $chapter->id]) }}"
                                        class="d-block text-decoration-none text-white d-flex justify-content-between flex-wrap my-2">
                                        <span class=" bg-secondary rounded-pill small py-0 px-2">
                                            {{ $chapter->title }}
                                        </span>
                                        <span class="small text-black-50">
                                            {{ $chapter->created_at->diffforhumans() }}
                                        </span>
                                    </a>

                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-6 col-md-3">
                    <div class="card border-0">
                        <div class="text-center">
                            <img src="{{ asset('img/sample.jpg') }}" alt="img" class="w-100  ">
                        </div>
                        <div class="mt-2">
                            <h5 class="fw-semibold ">The Villainous Desciple</h5>
                            <div class="d-flex justify-content-between flex-wrap mb-1">
                                <a href=""
                                    class="text-decoration-none text-white bg-secondary rounded-pill py-0 px-2">Chapter
                                    5</a>
                                <span class=" fs-6">5 mins ago</span>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap mb-1">
                                <a href=""
                                    class="text-decoration-none text-white bg-secondary rounded-pill py-0 px-2">Chapter
                                    4</a>
                                <span class=" fs-6">4 mins ago</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-12 col-md-3">
            @include('partials.hot-manga')
        </div>
    </div>
@endsection


@section('footer')
    @include('partials.footer')
@endsection
