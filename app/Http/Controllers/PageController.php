<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\HomePost;
use App\Models\posts\NewsPosts;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index($page)
    {
        return view("pages/" . $page);
    }

    public function homepage()
    {
        // $posts = HomePost::all();
        $posts = DB::select('SELECT * FROM home_posts WHERE id = ?' , ['1']);
        
        return view("pages/home", compact('posts'));
    }

    public function historypage()
    {
        $posts = DB::select('SELECT * FROM history_posts WHERE id = ?' , ['1']);
        
        return view("pages/historie", compact('posts'));
    }

    public function actueelpage()
    {
        $posts = DB::select('SELECT * FROM news_posts WHERE public = 1 ORDER BY datetime desc');
        
        return view("pages/actueel", ['posts' => $posts]);
    }

    public function newspost(NewsPosts $id)
    {
        return view("templates/newspost", ['post' => $id]);
    }
}
 