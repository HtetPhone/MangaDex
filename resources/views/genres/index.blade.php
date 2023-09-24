@extends('layouts.app')

@section('content')
    <x-card-card-body>
        <h5>Genres List</h5>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="min-width: 20%">Genre Name</th>
                        <th scope="col">Created_at</th>
                        <th>Option</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($genres as $key => $genre)
                        <tr>
                            <td> {{ $key }} </td>
                            <td> {{ $genre->name }} </td>
                            <td>
                                <p class="mb-0 small"> <i class="bi bi-clock-history"></i>
                                    {{ $genre->created_at->format('H:i a') }} </p>
                                <p class="mb-0 small"> <i class="bi bi-calendar-check"></i>
                                    {{ $genre->created_at->format('d-m-Y') }} </p>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('genres.edit', $genre)}}" class="btn text-info"> <i class="bi bi-pencil-square"></i> </a>
                                    <form method="POST" action="{{route('genres.destroy', $genre)}}" class="form-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to delete?')" class="btn text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                <tbody>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="text-danger fw-semibold mb-0 me-3">No genre Yet</p>
                                <a href="{{ route('genres.create') }}" class="btn btn-dark btn-sm">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforelse
                </tbody>
            </table>
        </div>
        <div>
            {{ $genres->links() }}
        </div>
    </x-card-card-body>
@endsection
