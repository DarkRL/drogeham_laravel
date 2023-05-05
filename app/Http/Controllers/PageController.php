<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePost;

class PageController extends Controller
{
    public function index($page)
    {
        return view("pages/" . $page);
    }

    public function homepage()
    {
        $posts = HomePost::all();
        return view("pages/home", compact('posts'));
    }
}
