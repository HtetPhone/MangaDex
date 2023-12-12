<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Manga;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function redirect() {
        $role = auth()->user()->role;
        if($role != 'user') {
            return redirect()->route('dashboard')->with(['message' => 'Welcome to Admin Dashboard!']);
        }else {
            return redirect()->route('page.index')->with(['message' => 'Welcome to MangaDex!']);
        }
    }
    public function contact()
    {
        return view('contact');
    }

    public function dashboard()
    {
        $authors = User::where('role', 'author')->get();
        $users = User::where('role', 'user')->get();
        $mangas = Manga::all();
        return view('dashboard', 
        [
            'authors' => $authors,
            'users'=> $users,
            'mangas' => $mangas,
        ]);
    }

    
}
