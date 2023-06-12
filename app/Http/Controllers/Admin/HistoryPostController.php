<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\HistoryPosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HistoryPostController extends Controller
{
    public function index()
    {
        $posts = DB::select('SELECT * FROM history_posts WHERE id = ?', ['1']);
        return view('admin.history.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = HistoryPosts::create([
            'fulltext' => $request->fulltext ?? " ",
            'datetime' => date("Y-m-d H:m:s")
        ]);
        return redirect()->route('admin.history.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangemaakt!');
    }

    public function create()
    {
        $id = 1;
        if (HistoryPosts::where('id', $id)->exists()) {
            return redirect()->route('admin.history.index');
        }
        return view('admin.history.create');
    }

    public function edit(HistoryPosts $id)
    {
        return view('admin.history.edit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        $beforeUpdate = HistoryPosts::findOrFail($id);
        HistoryPosts::find($id)->update([
            'fulltext' => $request->fulltext ?? " "
        ]);
        $afterUpdate = HistoryPosts::findOrFail($id);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);
        return redirect()->route('admin.history.index')
            ->withSuccess('De inhoud is succesvol aangepast!');
    }
}
