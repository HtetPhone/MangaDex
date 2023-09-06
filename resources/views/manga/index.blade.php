@extends('layouts.app')

@section('content')
    <x-card-card-body >
            <x-manga-list :mangas="$mangas" />
    </x-card-card-body>
@endsection
