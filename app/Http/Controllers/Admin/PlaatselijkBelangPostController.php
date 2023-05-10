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
        $posts = DB::select('SELECT * FROM plaatselijkbelang_posts WHERE id = ?' , ['1']);
        return view('admin.plaatselijkbelang.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = PlaatselijkbelangPosts::create([
            'fulltext' => $request->fulltext,
            'datetime' => date("Y-m-d H:m:s")
        ]);
        return redirect()->route('admin.plaatselijkbelang.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangemaakt!');
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
        PlaatselijkbelangPosts::find($id)->update([
            'fulltext' => $request->fulltext
        ]);
        return redirect()->route('admin.plaatselijkbelang.index')
            ->withSuccess('De inhoud is succesvol aangepast!');
    }
}
