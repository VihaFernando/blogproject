<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return redirect()->route('home.homepage');
            } elseif ($usertype == 'admin') {
                return redirect()->route('admin.home');
            } else {
                return redirect()->back()->with('error', 'Unauthorized access!');
            }
        }

        return redirect()->route('login');
    }

    public function post()
    {
        return view("post");
    }

    public function homepage()
    {
        return view('home.homepage');
    }
}
