<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-decoration-none"><a href="{{ route('page.index') }}">Home</a></li>
        <li class="breadcrumb-item text-decoration-none"><a href="{{ route('page.manga', $manga->slug) }}">
                {{ $manga->title }} </a></li>
        <li class="breadcrumb-item active" aria-current="page">Chapter {{ $chapter->chapter_no }} </li>
    </ol>
</nav>
