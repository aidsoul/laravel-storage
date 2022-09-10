<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class BlockedController extends Controller
{
    public function index()
    {
        if(auth()->user()->blocked === 0) return redirect(route('storage'));
        
        return view('user.blocked');
    }
}
