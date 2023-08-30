<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Models\Manga;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mangas = Manga::latest('id')->paginate(8)->withQueryString();
        return view('chapter.index', compact('mangas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chapter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        $formData = $request->validated();
        $formData['user_id'] = Auth::id();
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store($request->manga_id.'OfChapter', 'public');
            }
            $formData['images'] = $images;
        }

        Chapter::create($formData);

        return redirect()->route('home')->with(['message' => 'New Chapter has been added!!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return back()->with(['message' => "Successfully Deleted!"]);
    }

    public function manage(Manga $manga)
    {
        return view('chapter.manageChapter', compact('manga'));
    }
}
