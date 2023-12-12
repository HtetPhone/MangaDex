@props(['manga', 'chapters'])
<div class="mb-3 pb-4">
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
                    <span class="text-primary"> {{ $genre->name }} </span> /
                @endforeach
            </p>
            <p class="d-flex">
                <a href="{{ route('page.chapter', [$manga, $manga->firstChap]) }}" class="btn btn-primary me-1">Read
                    First</a>
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

        <div class="row flex-row px-3">
            @forelse ($chapters as $chapter)
                <div class="card px-3 pt-2 col-5 col-md-3 my-3 me-4">
                    <a href="{{ route('page.chapter', [$manga, $chapter]) }}" class="text-decoration-none text-black">
                        <p class="mb-1">
                            <span class="fw-semibold text-primary">
                                Chapter {{ $chapter->chapter_no }}
                            </span>
                            <span class="ms-2 small text-secondary fst-italic">
                                {{ $chapter->updated_at->diffForHumans() }}
                            </span>
                        </p>
                        <p class="small">
                            <span>
                                {{ $chapter->title ?? $chapter->title }}
                            </span>

                        </p>
                    </a>
                </div>
            @empty
                <p class="text-danger">No Chapter Yet!</p>
            @endforelse
        </div>
    </ul>
    {{ $chapters->links() }}
</div>
