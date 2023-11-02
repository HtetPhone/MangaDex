<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function redirect() {
        $role = auth()->user()->role;
        if($role != 'user') {
            return redirect()->route('home')->with(['message' => 'Welcome to Admin Dashboard!']);
        }else {
            return redirect()->route('page.index')->with(['message' => 'Welcome to MangaDex!']);
        }
    }
    public function contact()
    {
        return view('contact');
    }
}
