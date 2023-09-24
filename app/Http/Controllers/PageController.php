<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        // Storage::disk('local')->put('example.txt', 'Contents');
        $mangas = Manga::with(['chapters'])
        ->when(request()->has('search'), function($q) {
            $keyword = request()->search;
            $q->where('title', 'like', '%'.$keyword.'%');
        })
        ->latest('id')
        ->paginate(8)->withQueryString();
        $hotMangas = Manga::with(['chapters'])
        ->latest('id')->limit('3')->get();
        return view('index', ['mangas' => $mangas, 'hotMangas' => $hotMangas]);
    }

    public function manga(Manga $manga)
    {
        $chapters = $manga->chapters()
        ->latest('chapter_no')
        ->paginate(10);
        $hotMangas = Manga::with(['chapters'])
        ->latest('id')->limit('3')->get();
        return view('manga',[
            'manga' => $manga,
            'chapters' => $chapters,
            'hotMangas' => $hotMangas,
        ]);
    }

    public function chapter(Manga $manga,Chapter $chapter)
    {
        return view('chapter_page', [
            'manga' => $manga,
            'chapter' => $chapter,
            'comments' => $chapter->comments()->latest('id')->get()
        ]);
    }

    public function select(Manga $manga, Request $request)
    {
        return redirect()->route('page.chapter', [$manga, $request->chapter_no]);
    }
}
