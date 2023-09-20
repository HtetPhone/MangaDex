@extends('layouts.master')


@section('content')
    <div class="row mt-5">
        @if (request()->search)
            <div class="d-flex align-items-center mb-3">
                <h4 class="fw-semibold">#Search result by <span class="text-primary">{{ request()->search }}</span> </h4>
                <a title="clear search" href="{{ route('page.index') }}" class="btn btn-danger ms-4 p-0 px-1 border-1 border-dark"> <i class="bi bi-x-lg"></i> </a>
            </div>
        @endif
        <div class="col-12 col-lg-9 mb-4">
            <div class="row flex-wrap">
                @forelse ($mangas as $manga)
                    <x-outter-manga-frame :manga="$manga" />
                @empty
                    @if (request()->search)
                        <p class="text-center text-danger">Found nothing!!</p>
                    @else
                        <p class="text-center text-danger">No Manga Yet</p>
                    @endif
                @endforelse

            </div>
        </div>
        <hr class="d-block d-md-none w-75 mx-auto text-primary">
        <div class="col-12 col-lg-3 my-4 my-lg-0">
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
