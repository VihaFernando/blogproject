<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $post=Post::all();
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('home.homepage', compact('post'));
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

        $post=Post::all();
        return view('home.homepage',compact('post'));
    }
}