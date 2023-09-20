@auth
    <div class="my-3 mb-0 ms-3 w-75 reply-box d-none" id="reply{{ $comment->id}}">
        <p class="small text-black-50 mb-1"> <i class="bi bi-reply-all-fill"></i> Relying to <span class="text-primary">{{ $comment->user->name }}</span> </p>
        <form method="POST" action="{{route('replies.store')}}">
            @csrf
            <div class="input-group">
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                <input name="reply" type="text"
                    class="form-control focus-ring focus-ring-light rounded-start-pill px-3 py-1 border border-dark small" name="content"
                    value="{{ old('reply') }}">
                <button class="btn btn-dark rounded-end-pill"> <i class="bi bi-send-fill"></i> </button>
            </div>
            @error('reply')
                <p class="text-danger small"> {{ $message }} </p>
            @enderror
        </form>
    </div>
@endauth
