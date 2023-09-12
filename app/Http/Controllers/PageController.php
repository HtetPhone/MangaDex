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
        $mangas = Manga::when(request()->has('search'), function($q) {
            $keyword = request()->search;
            $q->where('title', 'like', '%'.$keyword.'%');
        })
        ->latest('id')
        ->paginate(8)
        ->withQueryString();

        return view('index', ['mangas' => $mangas]);
    }

    public function manga($slug)
    {
        $manga = Manga::where('slug', $slug)->first();
        $chapters = $manga->chapters()->orderBy('chapter_no', 'desc')->paginate(10);
        $firstChapter = $manga->chapters()->orderBy('chapter_no', 'asc')->first();
        $lastChapter = $manga->chapters()->latest('chapter_no')->first();
        // dd($firstChapter);
        return view('manga',[
            'manga' => $manga,
            'chapters' => $chapters,
            'firstChapter' => $firstChapter,
            'lastChapter' => $lastChapter
        ]);
    }

    public function chapter(Manga $manga, Chapter $chapter)
    {
        $firstChapter = $manga->chapters()->orderBy('chapter_no', 'asc')->first();
        $lastChapter = $manga->chapters()->latest('chapter_no')->first();
        return view('chapter_page', [
            'manga' => $manga,
            'chapter' => $chapter,
            'firstChapter' => $firstChapter,
            'lastChapter' => $lastChapter
        ]);
    }
}
