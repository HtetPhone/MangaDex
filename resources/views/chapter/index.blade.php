@extends('layouts.app')

@section('content')
    <div class="row">
        <h3>Choose Your Manga and See Chapters</h3>
        <hr>
        @foreach ($mangas as $manga)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <a class="text-decoration-none" href="{{ route('chapters.manage', $manga->slug) }}">
                    <div class="card card-body" style="min-height: 400px">
                        <div class="">
                            <img src="{{ asset( 'storage/'.$manga->cover) }}" class="img-fluid rounded" alt="">
                        </div>
                        <p class="fw-semibold mt-2 mb-1"> {{ $manga->title }} </p>
                        <p class="text-black-50 small">Total Chapter :
                            <span class="bg-warning p-1 py-0 rounded-circle"> {{ $manga->chapters->count() }} </span>
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div>
        {{ $mangas->links() }}
    </div>
@endsection
