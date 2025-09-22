<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function AdminLogin()
    {
        return view('backend.index');
    }

    public function AdminLogout()
    {
        Auth::logout();

        return redirect('/');
    }
}
