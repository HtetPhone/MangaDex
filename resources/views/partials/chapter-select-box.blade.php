<div class="col-4">
    <select name="" id="" class="form-select">
        @foreach ($manga->chapters()->latest('id')->get() as $chap)
            <option value="{{ $chap->id }}" {{ $chap->id == $chapter->id ? 'selected' : '' }}>
                Chapter {{ $chap->chapter_no }} - {{ $chap->title ?? '' }} </option>
        @endforeach
    </select>
</div>
