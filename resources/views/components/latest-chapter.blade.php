@props(['manga', 'chapter'])

<div class="d-flex justify-content-between flex-wrap mb-2">
    <a href="{{ route('page.chapter', [$manga->slug, $chapter->chapter_no]) }}"
        class="text-decoration-none text-white small bg-secondary rounded-pill px-1">
        Chapter {{ $chapter->chapter_no }}
    </a>
    <span class="small ms-1"> {{ $chapter->created_at->diffForHumans() }} </span>
</div>
