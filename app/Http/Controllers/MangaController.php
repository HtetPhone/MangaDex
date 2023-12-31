<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMangaRequest;
use App\Http\Requests\UpdateMangaRequest;
use App\Models\Genre;
use Illuminate\Support\Facades\Request as FacadesRequest;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mangas = Manga::latest('id')
        ->paginate(20)
        ->withQueryString();
        // dd($mangas);
        return view('manga.index', compact('mangas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::latest('id')->get();
        return view('manga.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMangaRequest $request)
    {
        $formData = $request->validated();
        $formData['slug'] = Str::slug($request->title);
        $formData['excerpt'] = Str::words($request->summary, 10, '...');
        $formData['author_id'] = Auth::id();
        if ($request->hasFile('cover')) {
            $formData['cover'] = $request->file('cover')->store('covers', 'public');
        }
        Manga::create($formData);
        //genres
        $genres = [];
        foreach ($request->genres as $genre) {
            $genres[] = $genre;
        }
        $manga = Manga::latest()->first();
        $manga->genres()->attach($genres);
        return redirect()->route('manga.index')->with(['message' => 'A New Manga is created']);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $manga = Manga::where('slug', $slug)->first();
        return view('manga.detail', compact('manga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manga $manga)
    {
        $this->authorize('update', $manga);
        // dd($manga->genres->contains('id','1'));
        return view('manga.edit', compact('manga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMangaRequest $request, Manga $manga)
    {
        $this->authorize('update', $manga);

        $formData = $request->validated();
        $formData['slug'] = Str::slug($request->title);
        $formData['excerpt'] = Str::words($request->summary, 10, '...');
        if ($request->hasFile('cover')) {
            $formData['cover'] = $request->file('cover')->store('covers', 'public');
        }
        $manga->update($formData);
        //adding data to medium table for many to many rs
        if ($request->genres) {
            $genres = [];
            foreach ($request->genres as $genre) {
                $genres[] = $genre;
            }
            $manga->genres()->sync($genres);
        }
        return redirect()->back()->with(['message' => 'Manga has been updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manga $manga)
    {
        $this->authorize('delete', $manga);

        $manga->delete();
        return redirect()->back()->with(['message' => 'Manga has been deleted!']);
    }
}
