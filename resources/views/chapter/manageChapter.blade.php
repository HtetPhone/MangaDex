@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a title="back" href="{{ url()->previous() }}" class="btn btn-dark"> <i class="bi bi-arrow-left"></i> </a>
        <a href="{{ route('chapter.index') }}" class="btn btn-dark"> <i class="bi bi-book"></i> Chapter List</a>
    </div>
    <h3> {{ $manga->title }} </h3>
    <hr>
    <h5> Chapters </h5>
    <div class="row">
        @foreach ($manga->chapters()->latest('id')->get() as $chapter)
            <div class="col-2">
                <div class="d-flex p-2 border border-1 border-dark rounded align-items-center justify-content-between mb-3">
                    <p class="small mb-0"> {{ $chapter->title }} </p>
                    <div class="btn-group">
                        <form method="POST" action="{{ route('chapter.destroy', $chapter->id) }}">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Do you want to delete this?')" class="btn btn-outline-dark btn-sm"> <i class="bi bi-trash"></i> </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
