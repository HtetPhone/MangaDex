<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin.access']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authors = User::where('role', 'author')->get();
        $users = User::where('role', 'user')->get();
        $mangas = Manga::all();
        // dd($authors);
        return view('home', ['authors' => $authors, 'users'=> $users, 'mangas' => $mangas]);
    }


}
