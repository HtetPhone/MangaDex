<ul class="list-group">
    <h5>Manga</h5>
    <a href="{{ route('manga.index') }}" class="list-group-item list-group-item-action"><i class="bi bi-book"></i> Manga
        List </a>
    <a href="{{ route('manga.create') }}" class="list-group-item list-group-item-action"><i
            class="bi bi-plus-circle-fill"></i> Create Manga</a>

    <h5 class="mt-4">Chapters</h5>
    <a href=" {{ route('chapter.index') }} " class="list-group-item list-group-item-action"><i class="bi bi-book"></i>
        Chapter List </a>
    <a href="{{ route('chapter.create') }}" class="list-group-item list-group-item-action"><i
            class="bi bi-plus-circle-fill"></i> Create Chapter</a>

    @can('admin-only')
        <h5 class="mt-4">Users</h5>
        <a href="{{ route('users.list') }}" class="list-group-item list-group-item-action"> <i class="bi bi-people"></i>
            Users List</a>
    @endcan
</ul>
