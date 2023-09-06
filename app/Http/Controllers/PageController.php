<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Manga;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $mangas = Manga::latest('id')->paginate(8)->withQueryString();
        return view('index', [
            'mangas' => $mangas
        ]);
    }

    public function manga($slug)
    {
        $manga = Manga::where('slug', $slug)->first();
        return view('manga', compact('manga'));
    }

    public function chapter(Manga $manga, Chapter $chapter)
    {
        return view('chapter_page', ['manga' => $manga, 'chapter' => $chapter]);
    }
}
