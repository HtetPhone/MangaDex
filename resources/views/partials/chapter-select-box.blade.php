<div class="col-4">
    <form action="{{route('select.chapter', [$manga->slug])}}" method="post" id="selectChapter" onchange="this.submit();">
        @csrf
        <select name="chapter_no" class="form-select">
            @foreach ($manga->chapters()->latest('chapter_no')->get() as $chap)
                <option value="{{ $chap->chapter_no }}" {{ $chap->chapter_no == $chapter->chapter_no ? 'selected' : '' }}>
                    Chapter {{ $chap->chapter_no }} - {{ $chap->title ?? '' }}
                 </option>
            @endforeach
        </select>
    </form>
</div>
