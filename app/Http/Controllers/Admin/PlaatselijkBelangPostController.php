<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\PlaatselijkbelangPosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaatselijkBelangPostController extends Controller
{
    public function index()
    {
        $posts = DB::select('SELECT * FROM plaatselijkbelang_posts WHERE id = ?', ['1']);
        return view('admin.plaatselijkbelang.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = PlaatselijkbelangPosts::create([
            'fulltext' => $request->fulltext ?? " ",
            'datetime' => date("Y-m-d H:m:s")
        ]);

        if ($newPost) {
            return redirect()->route('admin.plaatselijkbelang.index')
                ->withSuccess('Nieuwe inhoud is succesvol aangemaakt!');
        }
        return redirect()->route('admin.plaatselijkbelang.index')
            ->withFail('Er is een probleem opgetreden, inhoud is niet aangemaakt!');
    }

    public function create()
    {
        $id = 1;
        if (PlaatselijkbelangPosts::where('id', $id)->exists()) {
            return redirect()->route('admin.plaatselijkbelang.index');
        }
        return view('admin.plaatselijkbelang.create');
    }

    public function edit(PlaatselijkbelangPosts $id)
    {
        return view('admin.plaatselijkbelang.edit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        $beforeUpdate = PlaatselijkbelangPosts::findOrFail($id);

        $saved = PlaatselijkbelangPosts::find($id)->update([
            'fulltext' => $request->fulltext ?? " "
        ]);
        $afterUpdate = PlaatselijkbelangPosts::findOrFail($id);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);

        if ($saved) {
            return redirect()->route('admin.plaatselijkbelang.index')
                ->withSuccess('Nieuwe inhoud is succesvol aangepast!');
        }
        return redirect()->route('admin.plaatselijkbelang.index')
            ->withFail('Er is een probleem opgetreden, inhoud is niet aangepast!');
    }
}
