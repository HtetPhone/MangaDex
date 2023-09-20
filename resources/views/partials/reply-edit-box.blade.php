<div class="my-3 w-75 d-none reply-edit-box" id="editReply{{ $reply->id }}">
    <form method="POST" action="{{ route('replies.update', $reply->id) }}">
        @csrf
        @method('PUT')
        <div class="input-group">
            <input name="reply_edit" type="text" class="form-control rounded-start-pill px-3 py-1 border border-dark small"
                name="content" value="{{ old('reply_edit', $reply->reply) }}">
            <button class="btn btn-dark rounded-end-pill"> Save </button>
        </div>
        @error('reply_edit')
            <p class="text-danger small"> {{$message}} </p>
        @enderror
    </form>
</div>
