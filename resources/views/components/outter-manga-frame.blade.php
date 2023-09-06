@props(['manga'])

<div class="col-6 col-md-3">
    <div class="card border-0">
        <div class="text-center">
            <a href="{{ route('page.manga', $manga->slug) }}">
                <img src="{{ asset( 'storage/'.$manga->cover ) }}" alt="img"
                    class="w-100">
            </a>
        </div>
        <div class="mt-2">
            <h5 class="fw-semibold "> {{ $manga->title }} </h5>
            @forelse ($manga->chapters()->latest('id')->limit(2)->get() as $chapter)
                <x-latest-chapter :manga="$manga" :chapter="$chapter" />
            @empty
            <p class="small text-danger">No Chapter Yet</p>
            @endforelse
        </div>
    </div>
</div>
