<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\BrinkpraatPosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrinkpraatPostController extends Controller
{
    public function index()
    {
        $posts = DB::select('SELECT * FROM brinkpraat_posts WHERE id = ?' , ['1']);
        return view('admin.brinkpraat.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = BrinkpraatPosts::create([
            'fulltext' => $request->fulltext,
            'datetime' => date("Y-m-d H:m:s")
        ]);
        return redirect()->route('admin.brinkpraat.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangemaakt!');
    }

    public function create()
    {
        $id = 1;
        if (BrinkpraatPosts::where('id', $id)->exists()) {
            return redirect()->route('admin.brinkpraat.index');
        }
        return view('admin.brinkpraat.create');
    }

    public function edit(BrinkpraatPosts $id)
    {
        return view('admin.brinkpraat.edit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        BrinkpraatPosts::find($id)->update([
            'fulltext' => $request->fulltext
        ]);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        return redirect()->route('admin.brinkpraat.index')
            ->withSuccess('De inhoud is succesvol aangepast!');
    }
}
