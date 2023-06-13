<?php

namespace App\Http\Controllers;

use App\Models\admin\MeydPosts;
use Illuminate\Http\Request;
use App\Models\posts\Event;
use App\Models\posts\NewsPosts;
use App\Models\admin\ProjectPost;
use App\Models\admin\BrinkpraatfilePosts;
use Illuminate\Support\Facades\DB;
use App\Models\posts\ContactPosts;

class PageController extends Controller
{
    public function __construct()
    {
        $meydRecords = MeydPosts::all()->where('public', '=', 1);

        view()->share('meydRecords', $meydRecords);
    }

    public function index($page)
    {
        return view("pages/" . $page);
    }

    public function homepage()
    {
        $posts = DB::select('SELECT * FROM home_posts WHERE id = ?', ['1']);
        $carouselProjecten = DB::select('SELECT  * FROM project_posts WHERE public = 1 ORDER BY updated_at desc LIMIT 4');
        $carouselNewsPosts = DB::select('SELECT * FROM news_posts WHERE public = 1 ORDER BY updated_at desc LIMIT 6');

        if (count($carouselProjecten) < 6) {
            $carouselProjecten = [];
        }

        if (count($carouselNewsPosts) < 6) {
            $carouselNewsPosts = [];
        }

        if (count($carouselNewsPosts) > 3) { // split het int twee arrays met drie items is makkelijker voor de front-end
            $carouselNewsPosts = array_chunk($carouselNewsPosts, 3);
        }
        return view("pages/home", compact('posts', 'carouselProjecten', 'carouselNewsPosts'));
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
        $posts = DB::table('news_posts')->where('public', '=', 1)->orderBy('id', 'desc')->paginate(15);

        return view("pages/actueel", ['posts' => $posts]);
    }

    public function newspost(NewsPosts $id)
    {
        return view("templates/newspost", ['post' => $id]);
    }

    public function meydinfopage()
    {
        $posts = DB::select('SELECT * FROM meydinfo_posts WHERE id = ?', ['1']);

        return view("pages/meydinfo", compact('posts'));
    }

    public function meydpost($pagename)
    {
        $post = MeydPosts::where('pagename', $pagename)->first();
        return view("templates/meydpost", compact('post'));
    }

    public function projectenpage()
    {
        $posts = DB::table('project_posts')->where('public', '=', 1)->orderBy('id', 'desc')->paginate(15);

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

    public function eventajax(Request $request, $id) // query for ajax call to load calendar event data
    {
        $post = Event::findOrFail($id);
        $fulltext = $post->fulltext;

        return response()->json([
            'text' => $fulltext
        ]);
    }

    public function brinkpraatpage()
    {
        $posts = DB::select('SELECT * FROM brinkpraat_posts WHERE id = ?', ['1']);
        $posts_files = BrinkpraatfilePosts::where('public', 1)->orderBy('datetime', 'asc')->get();

        $groupedFiles = $posts_files->groupBy(function ($file) {
            return date('Y', strtotime($file->datetime));
        });

        return view("pages/brinkpraat", compact('posts', 'groupedFiles'));
    }

    public function contactSumbit(request $request)
    {
        $NewContract = ContactPosts::create([
            'naam' => $request->name,
            'email' => $request->email,
            'tel' => $request->Tel,
            'bericht' => $request->message,
            'updated_at' => date("Y-m-d Hs"),
            'created_at' => date("Y-m-d Hs"),
        ]);
        return back();
    }
}
