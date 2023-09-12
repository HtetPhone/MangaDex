<div>
    <a
    href="{{ route('page.chapter', [$manga->slug, $chapter->chapter_no - 1 ]) }}"
    class="btn btn-{{$chapter->chapter_no == $firstChapter->chapter_no ? 'secondary' : 'dark' }} btn-small {"
        style="pointer-events: {{ $chapter->chapter_no == $firstChapter->chapter_no ? 'none' : '' }}">
        Previous
    </a>
    {{-- <p> {{ }} </p> --}}
    <a
    href="{{ route('page.chapter', [$manga->slug, $chapter->chapter_no + 1 ]) }}"
    class="btn btn-{{ $chapter->chapter_no == $lastChapter->chapter_no ? 'secondary' : 'dark' }} btn-small"
    style="pointer-events: {{ $chapter->chapter_no == $lastChapter->chapter_no ? 'none' : '' }}">
        Next
    </a>
</div>
