<h5 class="fw-semibold">Comments From Chapter - {{ $chapter->chapter_no }}</h5>
<h5 class="my-4 mt-5"> <i class="bi bi-star bg-primary text-white px-2 py-1 rounded-1"></i> Discussion </h5>

@guest
    <p class="text-black-50">You must <a href="{{ route('register') }}" class="text-decoration-none">Register</a> or <a
            href="{{ route('login') }}" class="text-decoration-none">Login</a> to post a Comment.
    </p>
@endguest

@auth
    <div class="d-flex justify-content-between w-75">
        <p class="text-black-50"> {{ $chapter->comments->count() }} {{ Str::plural('comment', $chapter->comments->count()) }}
        </p>
        <p>
            <i class="bi bi-chat-fill"></i> {{ auth()->user()->name }}
        </p>
    </div>
    <form action="{{ route('comments.store') }}" method="POST" class="mb-5">
        @csrf
        <div class="input-group w-75">
            <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
            <input type="text" class="form-control rounded-start-pill px-4 py-2 border border-dark" name="comment"
                placeholder="Join the discussion ...">
            <button type="submit" class="btn btn-dark rounded-end-pill"> Comment </button>
        </div>
        @error('comment')
            <p class="text-danger small"> {{ $message }} </p>
        @enderror
    </form>
@endauth
<hr>

<!-- comment outputs here -->
<div class="p-2">
    @forelse ($comments as $comment)
        <div class="mb-4 border-bottom">
            <p class="mb-1">
                <span class="fw-bold text-primary"> <i class="bi bi-person-fill"></i> {{ $comment->user->name }}</span>
                <span class="small text-black-50 fw-light ms-2"> {{ $comment->created_at->diffForHumans() }} </span>
            </p>
            <p class="small mb-0">
                 {{ $comment->comment }}
            </p>
            <!-- comment edit box here -->
            @include('partials.comment-edit-box')

            <!-- reply box here -->
            @include('partials.reply-box')

            <!-- comment edit | delete | reply -->
            <p class="d-flex align-items-center">
                @can('update', $comment)
                    <button class="btn btn-sm text-info edit-btn" id="edit{{ $comment->id }}">
                        Edit
                    </button>
                    <span class="mx-2"> <i class="bi bi-cone-striped text-danger"></i> </span>
                @endcan
                @can('delete', $comment)
                    <button form="deleteCommentForm{{ $comment->id }}" class="btn btn-sm text-danger">Delete</button>
                    <span class="mx-2"> <i class="bi bi-cone-striped text-danger"></i> </span>
                @endcan

                @auth
                    <button id="reply{{ $comment->id }}" class="btn btn-sm text-info reply-btn">Reply</button>
                @endauth

                <!-- replies here -->
                @include('partials.replies')

            </p>
            <form id="deleteCommentForm{{ $comment->id }}" class=""
                action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
            </form>


            <!-- comment edit | delete | reply -->
        </div>
    @empty
        <p class="text-black-50">There are no comments yet!</p>
    @endforelse
</div>
