<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\HomePost;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePostController extends Controller
{
    public function index()
    {
        // $posts = HomePost::all();
        $posts = DB::select('SELECT * FROM home_posts WHERE id = ?' , ['1']);
        return view('admin.home.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = HomePost::create([
            'fulltext' => $request->fulltext,
            'datetime' => date("Y-m-d H:m:s")
        ]);
        return redirect()->route('admin.home.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangemaakt!');
    }

    public function create()
    {
        $id = 1;
        if (HomePost::where('id', $id)->exists()) {
            return redirect()->route('admin.home.index');
        }
        return view('admin.home.create');
    }

    public function edit(HomePost $id)
    {
        return view('admin.home.edit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        HomePost::find($id)->update([
            'fulltext' => $request->fulltext
        ]);
        return redirect()->route('admin.home.index')
            ->withSuccess('De inhoud is succesvol aangepast!');
    }
}
