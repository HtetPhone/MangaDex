<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // $this->authorize('admin-only', Auth::user()->role);
        $users = User::latest('id')->paginate(10)->withQueryString();
        return view('user.index', compact('users'));
    }
}
