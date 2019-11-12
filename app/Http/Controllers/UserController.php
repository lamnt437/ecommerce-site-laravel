<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function info($id) {
        $user = User::where('id', $id)->firstOrFail();

        if($user->id != auth()->id())
            abort(403);

        return view('users.info', compact('user'));
    }

    public function request($id) {
        $user = User::where('id', $id)->firstOrFail();

        if($user->id != auth()->id())
            abort(403);

        return view('users.request', compact('user'));
    }
}
