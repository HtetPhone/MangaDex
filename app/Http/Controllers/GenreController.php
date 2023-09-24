<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::latest()->paginate(10)->withQueryString();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255|unique:genres,name'
        ], [
            'name.required' => 'Genre name is required'
        ]);

        $request->user()->genres()->create($request->only('name'));
        return back()->with(['message' => 'New genre has been added!!']);
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit',['genre' => $genre]);
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|min:1|max:255|unique:genres,name,'.$genre->id
        ],[
            'name.required' => 'Genre field is required!',
            'name.unique' => 'Genre already exists!'

        ]);

        $genre->update(['name' => $request->name]);
        return redirect()->route('genres.index')->with(['message' => 'Genre has been updated!']);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return back()->with(['message' => 'Genre has been deleted']);
    }
}
