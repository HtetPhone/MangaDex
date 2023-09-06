@extends('layouts.master')

@section('content')

    @include('partials.manga-breadcrum')

    <div class="row mt-5">
        <div class="col-12 col-md-9">
            <x-inner-manga :manga="$manga" />
        </div>

        <div class="col-12 col-md-3">
            @include('partials.hot-manga')
        </div>
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection
