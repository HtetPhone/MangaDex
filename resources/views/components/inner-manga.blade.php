@props(['manga'])
<div>
    <div class="text-center">
        <img class="w-25" src="{{ asset('storage/' . $manga->cover) }}" alt="">
    </div>
    <h3 class="text-center my-3">{{ $manga->title }}</h3>
    <p> {{ $manga->summary }} </p>
    <ul class="list-group my-3 mt-5 mx-auto">
        <h5 class="fw-bold mb-4">
            Latest Chapters
        </h5>
        
        @forelse ($manga->chapters()->latest('id')->get() as $chapter)
                <a href="{{ route('page.chapter', [$manga->slug, $chapter->id]) }}"
                    class="list-group-item list-group-item-action pb-0 border-0 border-bottom
                     d-inline-block d-flex align-items-center justify-content-between">
                    <p> Chapter {{ $chapter->chapter_no }} - {{ $chapter->title ?? '' }} </p>
                    <p class="text-black-50 small">
                         {{$chapter->updated_at->diffForHumans()}}
                    </p>
                </a>
        @empty
            <p class="text-danger">No Chapter Yet!</p>
        @endforelse
    </ul>
</div>
