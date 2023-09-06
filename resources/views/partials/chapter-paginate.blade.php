<div>
    <a
    href="{{ route('page.chapter', [$manga->slug, $chapter->chapter_no - 1 ]) }}"
    class="btn btn-{{$chapter->chapter_no == 1 ? 'secondary' : 'dark' }} btn-small {"
        style="pointer-events: {{ $chapter->chapter_no == 1 ? 'none' : '' }}">
        Previous
    </a>
    <a
    href="{{ route('page.chapter', [$manga->slug, $chapter->chapter_no + 1 ]) }}"
    class="btn btn-{{ $chapter->chapter_no == $manga->chapters->last()->chapter_no ? 'secondary' : 'dark' }} btn-small"
    style="pointer-events: {{ $chapter->chapter_no == $manga->chapters->last()->chapter_no ? 'none' : '' }}"
    >
        Next
    </a>
</div>
