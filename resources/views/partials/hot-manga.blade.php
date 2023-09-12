<h5 class="fw-semibold text-primary"> <i class="bi bi-award-fill"></i> Manga Hot</h5>
<div class="row">
    @forelse (App\Models\Manga::latest('id')->limit(3)->get() as $hotManga)
        <div class="col-12 mt-3">
            <div class="row border-0 flex-wrap">
                <div class="overflow-hidden col-4">
                    <a href="{{ route('page.manga', $hotManga->slug) }}">
                        <img src="{{ asset( 'storage/'.$hotManga->cover) }}"
                            alt="img" class="cover-img img-fluid">
                    </a>
                </div>
                <div class="col-8">
                    <a href="{{ route('page.manga', $hotManga->slug) }}" class="text-decoration-none">
                        <p class="fw-semibold mb-1"> {{ $hotManga->title }} </p>
                    </a>

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
