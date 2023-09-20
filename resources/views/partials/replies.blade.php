@if ($comment->replies->count())
    <a class="btn btn-sm btn-link" data-bs-toggle="collapse" href="#collapseReplies{{$comment->id}}" role="button" aria-expanded="false"
        aria-controls="collapseReplies{{$comment->id}}">
        See the other replies ...
    </a>
    <div class="collapse" id="collapseReplies{{$comment->id}}">
        @foreach ($comment->replies()->latest()->get() as $reply)
            <div class="ms-5">
                <div class="d-flex align-items-center mb-0">
                    <div>
                        <span class="text-primary">
                            {{ $reply->user->name }}
                        </span>

                        <i class="bi bi-reply-fill d-inline-block" style="transform: rotate(150deg) skewY(-1deg);"></i>

                        <span class="text-primary">
                            {{ $comment->user->name }}
                        </span>

                        <span class="small text-black-50 fw-light ms-2">
                            {{ $reply->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <!-- edit and delete -->
                    <div class="small d-flex flex-nowrap">
                        @can('update', $reply)
                            <button id="editReply{{ $reply->id }}" class="btn btn-sm text-success reply-edit-btn">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        @endcan

                        @can('delete', $reply)
                            <form action="{{ route('replies.destroy', $reply->id) }}" method="POST" class="">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm text-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
                <p class="small">
                    {{ $reply->reply }}
                </p>

                @include('partials.reply-edit-box')
            </div>
        @endforeach
    </div>
@endif
