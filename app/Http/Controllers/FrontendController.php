<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function AdminLogin()
    {
        return view('backend.index');
    }
}
