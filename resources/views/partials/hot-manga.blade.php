<h4 class="fw-semibold">Manga Hot</h4>
<div class="row">
    @foreach ($hotMangas as $hotManga)
        <div class="col-12 mt-3">
            <div class="d-flex border-0">
                <div>
                    <a href="{{ route('page.manga', $hotManga->slug) }}"><img src="{{ asset($hotManga->cover) }}" alt="img" style="width: 80px"></a>
                </div>
                <div class="ms-2">
                    <p class="fw-semibold mb-1"> {{ $hotManga->title }} </p>
                    @foreach ($hotManga->chapters()->latest('id')->limit(2)->get() as $hotChap)
                        <div class="d-flex justify-content-between flex-wrap mb-2">
                            <a href="{{route('page.chapter',[$hotManga->slug, $hotChap->id])}}"
                                class="text-decoration-none text-white small bg-secondary rounded-pill px-1">
                                {{ $hotChap->title }}
                            </a>
                            <span class="small"> {{$hotChap->created_at->diffForHumans()}} </span>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endforeach
</div>
