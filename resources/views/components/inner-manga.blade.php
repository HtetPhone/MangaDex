@props(['manga', 'chapters'])
<div>
    <h5 class="fw-semibold my-3 text-primary"> <i class="bi bi-award-fill"></i> {{ $manga->title }}</h5>

    <div class="row my-3">
        <div class="col-12 col-md-4">
            <div class="text-center">
                <img class="image-fluid" src="{{ asset('storage/' . $manga->cover) }}" alt="">
            </div>
        </div>
        <div class="col-12 col-md-7">
            <p> <span class="fw-semibold">Author</span> - {{ $manga->user->name }} </p>
            <p>
                <span class="fw-semibold">Genre</span> -
                @foreach ($manga->genres as $genre)
                    <span class="text-primary"> {{$genre->name}} </span> /
                @endforeach
            </p>
            <p class="d-flex">
                <a href="{{ route('page.chapter', [$manga, $manga->firstChap]) }}" class="btn btn-primary me-1">Read First</a>
            <a href="{{ route('page.chapter', [$manga, $manga->lastChap]) }}" class="btn btn-primary">Read Last</a>
            </p>
        </div>
    </div>

    <div class="my-5">
        <h5 class="fw-semibold text-primary"> <i class="bi bi-award-fill"></i> Summary </h5>
        <hr>
        <p class="text-black-50"> {{ $manga->summary }} </p>
    </div>

    <ul class="list-group my-3 mt-5 mx-auto">
        <h5 class="w-semibold text-primary">
            <i class="bi bi-award-fill"></i> Latest Chapter Release
        </h5>

        @forelse ($chapters as $chapter)
            <a href="{{ route('page.chapter', [$manga, $chapter]) }}"
                class="list-group-item list-group-item-action pb-0 border-0 border-bottom
                     d-inline-block d-flex align-items-center justify-content-between">
                <p> Chapter {{ $chapter->chapter_no }} - {{ $chapter->title ?? '' }} </p>
                <p class="text-black-50 small">
                    {{ $chapter->updated_at->diffForHumans() }}
                </p>
            </a>
        @empty
            <p class="text-danger">No Chapter Yet!</p>
        @endforelse
    </ul>
    {{ $chapters->links() }}
</div>
