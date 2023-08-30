@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($mangas as $manga)
            <div class="col-6 col-md-3 mb-4">
                <a class="text-decoration-none" href="{{ route('chapters.manage', $manga->slug) }}">
                    <card class="card card-body">
                        <div>
                            <img src="{{ asset($manga->cover) }}" class="w-100" alt="">
                        </div>
                        <p class="fw-semibold mt-2 mb-0"> {{ $manga->title }} </p>
                        <p class="text-black-50 small">Total Chapter :
                            <span class="bg-warning p-1 py-0 rounded-circle"> {{ $manga->chapters->count() }} </span>
                        </p>
                    </card>
                </a>
            </div>
        @endforeach
    </div>
    <div>
        {{ $mangas->links() }}
    </div>
@endsection
