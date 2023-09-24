<h5 class="fw-semibold text-primary"> <i class="bi bi-award-fill"></i> Manga Hot</h5>
<div class="row">
    @forelse ($hotMangas as $hotManga)
        <div class="row border-0 flex-wrap my-3 mb-4">
            <div class="overflow-hidden col-3 col-lg-4">
                <a href="{{ route('page.manga', $hotManga) }}">
                    <img src="{{ asset('storage/' . $hotManga->cover) }}" alt="img" class="cover-img img-fluid">
                </a>
            </div>
            <div class="col-5 col-lg-8">
                <a href="{{ route('page.manga', $hotManga) }}" class="text-decoration-none">
                    <p class="fw-semibold mb-1"> {{ $hotManga->title }} </p>
                </a>

                @foreach ($hotManga->chapters()->latest('id')->limit(2)->get() as $hotChap)
                    <x-latest-chapter :manga="$hotManga" :chapter="$hotChap" />
                @endforeach

            </div>
        </div>
    @empty
        <p class="text-danger small">No Hot Manga Yet</p>
    @endforelse
</div>
