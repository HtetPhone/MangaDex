<ul class="list-group d-none d-lg-block w-75 w-lg-100 me-3" id="sideBar">
    <h5>
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action text-primary">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
    </h5>

    <h5>Manga</h5>
    <a href="{{ route('manga.index') }}" class="list-group-item list-group-item-action">
        <i class="bi bi-book"></i> Manga List
    </a>
    <a href="{{ route('manga.create') }}" class="list-group-item list-group-item-action">
        <i class="bi bi-plus-circle-fill"></i> Create Manga
    </a>

    <h5 class="mt-4">Chapters</h5>
    <a href=" {{ route('chapter.index') }} " class="list-group-item list-group-item-action">
        <i class="bi bi-book"></i> Chapter List
    </a>
    <a href="{{ route('chapter.create') }}" class="list-group-item list-group-item-action">
        <i class="bi bi-plus-circle-fill"></i> Create Chapter
    </a>

    @can('admin-only')
        <h5 class="mt-4">Genres</h5>
        <a href="{{ route('genres.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-tags-fill"></i> Genres List
        </a>
        <a href="{{ route('genres.create') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-plus-circle-fill"></i> Create Genre
        </a>
        <h5 class="mt-4">Users</h5>
        <a href="{{ route('users.list') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-people"></i> Users List
        </a>
    @endcan
</ul>

<button id="sideBarBtn" class="btn btn-outline-dark d-block d-lg-none">
    <i class="bi bi-list h4"></i>
</button>