@extends('layouts.master')


@section('content')
    <div class="row mt-5">
        <div class="col-12 col-md-9">
            <div class="row flex-wrap">
                @forelse ($mangas as $manga)
                    <x-outter-manga-frame :manga="$manga" />
                @empty
                    <p class="text-center text-danger">No Manga Yet</p>
                @endforelse

            </div>
        </div>

        <div class="col-12 col-md-3">
            @include('partials.hot-manga')
        </div>
        <div class="col-12 mt-5">
            <div class="float-end">
                {{ $mangas->links() }}
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer />
@endsection
