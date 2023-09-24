<div>
    <a
    href="{{ route('page.chapter', [$manga, $chapter->chapter_no - 1 ]) }}"
    class="btn btn-{{$chapter->chapter_no == $manga->firstChap->chapter_no ? 'secondary' : 'dark' }} btn-small {"
        style="pointer-events: {{ $chapter->chapter_no == $manga->firstChap->chapter_no ? 'none' : '' }}">
        Previous
    </a>
    
    <a
    href="{{ route('page.chapter', [$manga, $chapter->chapter_no + 1 ]) }}"
    class="btn btn-{{ $chapter->chapter_no == $manga->lastChap->chapter_no ? 'secondary' : 'dark' }} btn-small"
    style="pointer-events: {{ $chapter->chapter_no == $manga->lastChap->chapter_no ? 'none' : '' }}">
        Next
    </a>
</div>
