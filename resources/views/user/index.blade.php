@extends('layouts.app')

@section('content')
    <x-card-card-body>
        <h5>User List</h5>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="min-width: 20%">Name</th>
                        <th>Role</th>
                        <th scope="col">Manga Count(created) </th>
                        <th scope="col">Created_at</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $key => $user)
                        <tr>
                            <td> {{ $key }} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->role }} </td>
                            <td> {{ $user->mangas->count() }} </td>
                            <td>
                                <p class="mb-0 small"> <i class="bi bi-clock-history"></i>
                                    {{ $user->created_at->format('H:i a') }} </p>
                                <p class="mb-0 small"> <i class="bi bi-calendar-check"></i>
                                    {{ $user->created_at->format('d-m-Y') }} </p>
                            </td>
                        </tr>
                    @empty
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <p class="text-danger fw-semibold mb-0">No User Yet</p>
                            </td>
                        </tr>
                    </tbody>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            {{ $users->links() }}
        </div>
    </x-card-card-body>
@endsection
