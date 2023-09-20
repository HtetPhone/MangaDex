<div class="my-3 w-75 d-none edit-box" id="edit{{ $comment->id }}">
    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
        @csrf
        @method('PUT')
        <div class="input-group">
            <input name="comment_edit" type="text" class="form-control rounded-start-pill px-3 py-1 border border-dark small"
                name="content" value="{{ old('comment_edit', $comment->comment) }}">
            <button class="btn btn-dark rounded-end-pill"> Save </button>
        </div>
        @error('comment_edit')
            <p class="text-danger small"> {{$message}} </p>
        @enderror
    </form>
</div>
