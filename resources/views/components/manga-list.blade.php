@props(['mangas'])

<div class="d-flex align-items-center">
    <h5>Manga List</h5>
    <a href="{{route('manga.create')}}" class="btn btn-sm btn-dark ms-auto"><i class="bi bi-plus-circle"></i> Create Manga</a>
</div>
<hr>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="min-width: 20%">Title</th>
                <th>Genre</th>
                <th>Author/Creator</th>
                <th scope="col">Total Chapters</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mangas as $key => $manga)
                <tr>
                    <th scope="row"> {{ $key + 1 }} </th>
                    <td>
                        <p class="mb-0">{{ $manga->title }}</p>
                        <span class="small text-black-50">{{ $manga->excerpt }}</span>
                    </td>
                    <td>
                       @foreach ($manga->genres as $genre)
                            <span class="small">{{$genre->name}} </span> /
                       @endforeach
                    </td>
                    <td>
                        {{ $manga->user->name }}
                    </td>
                    <td class="text-center">
                        {{ $manga->chapters->count() }}
                    </td>

                    <td>
                        <div class="btn-group">
                            @can('view', $manga)
                                <a href="{{ route('manga.show', $manga->slug) }}" class="btn btn-outline-dark"><i
                                        class="bi bi-exclamation-diamond"></i>
                                </a>
                            @endcan

                            @can('update', $manga)
                                <a href="{{ route('manga.edit', $manga->id) }}" class="btn btn-outline-dark" title="edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            @endcan
                            @can('delete', $manga)
                                <button class="btn btn-outline-dark" form="deleteForm{{ $manga->id }}" title="delete"
                                    onclick="return confirm('Are sure to delete?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            @endcan
                        </div>
                        <form method="post" id="deleteForm{{ $manga->id }}"
                            action="{{ route('manga.destroy', $manga->id) }}" class="d-inline-block">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @empty
                <p class="text-danger">No Manga Yet</p>
            @endforelse

        </tbody>
    </table>
</div>

<div class="">
    {{ $mangas->links() }}
</div>
