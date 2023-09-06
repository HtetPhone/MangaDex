<h4 class="fw-semibold">Manga Hot</h4>
<div class="row">
    @forelse (App\Models\Manga::latest('id')->limit(3)->get() as $hotManga)
        <div class="col-12 mt-3">
            <div class="d-flex border-0">
                <div>
                    <a href="{{ route('page.manga', $hotManga->slug) }}">
                        <img src="{{ asset( 'storage/'.$hotManga->cover) }}"
                            alt="img" style="max-width: 80px">
                    </a>
                </div>
                <div class="ms-2">
                    <p class="fw-semibold mb-1"> {{ $hotManga->title }} </p>

                    @foreach ($hotManga->chapters()->latest('id')->limit(2)->get() as $hotChap)
                        <x-latest-chapter :manga="$hotManga" :chapter="$hotChap" />
                    @endforeach
                    
                </div>
            </div>
        </div>

    @empty
    <p class="text-danger small">No Hot Manga Yet</p>
    @endforelse
</div>
