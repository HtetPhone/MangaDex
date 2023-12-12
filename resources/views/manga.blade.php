@extends('layouts.master')

@section('content')

    @include('partials.manga-breadcrum')

    <div class="row mt-5">
        <div class="col-12 col-lg-9">
            <x-inner-manga :manga="$manga" :chapters="$chapters" />
        </div>

        <div class="col-12 col-lg-3">
            @include('partials.hot-manga')
        </div>
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection
