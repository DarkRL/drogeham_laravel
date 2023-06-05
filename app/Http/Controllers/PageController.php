<?php

namespace App\Http\Controllers;

use App\Models\admin\MeydPosts;
use Illuminate\Http\Request;
use App\Models\posts\Event;
use App\Models\posts\NewsPosts;
use App\Models\admin\ProjectPost;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function __construct()
    {
        $meydRecords = MeydPosts::all();

        view()->share('meydRecords', $meydRecords);
    }

    public function index($page)
    {
        return view("pages/" . $page);
    }

    public function homepage()
    {
        $posts = DB::select('SELECT * FROM home_posts WHERE id = ?', ['1']);

        return view("pages/home", compact('posts'));
    }

    public function historypage()
    {
        $posts = DB::select('SELECT * FROM history_posts WHERE id = ?', ['1']);

        return view("pages/historie", compact('posts'));
    }

    public function plaatselijkbelangpage()
    {
        $posts = DB::select('SELECT * FROM plaatselijkbelang_posts WHERE id = ?', ['1']);

        return view("pages/plaatselijkbelang", compact('posts'));
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

    public function meydpost($pagename)
    {
        $post = MeydPosts::where('pagename', $pagename)->first();
        return view("templates/meydpost", compact('post'));
    }

    public function projectenpage()
    {
        $posts = DB::select('SELECT * FROM project_posts WHERE public = 1 ORDER BY updated_at desc');

        return view("pages/projecten", ['posts' => $posts]);
    }

    public function projectpost(ProjectPost $id)
    {
        return view("templates/projectpost", ['post' => $id]);
    }

    public function agendapage()
    {
        $posts = Event::all();

        return view("pages/agenda", ['posts' => $posts]);
    }
    
    public function brinkpraatpage()
    {
        $posts = DB::select('SELECT * FROM brinkpraat_posts WHERE id = ?', ['1']);

        return view("pages/brinkpraat", compact('posts'));
    }
}
