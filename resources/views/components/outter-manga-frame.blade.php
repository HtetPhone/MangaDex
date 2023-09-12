@props(['manga'])

<div class="col-6 col-md-3">
    <div class="card border-0">
        <div class="text-center overflow-hidden">
            <a href="{{ route('page.manga', $manga->slug) }}">
                <img src="{{ asset( 'storage/'.$manga->cover ) }}" alt="img"
                    class="w-100 cover-img">
            </a>
        </div>
        <div class="mt-2">
            <a href="{{ route('page.manga', $manga->slug) }}" class="text-decoration-none">
                <h5 class="fw-semibold "> {{ $manga->title }} </h5>
            </a>
            @forelse ($manga->chapters()->latest('id')->limit(2)->get() as $chapter)
                <x-latest-chapter :manga="$manga" :chapter="$chapter" />
            @empty
            <p class="small text-danger">No Chapter Yet</p>
            @endforelse
        </div>
    </div>
</div>
