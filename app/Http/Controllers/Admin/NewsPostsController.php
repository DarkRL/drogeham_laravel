<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\NewsPosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsPostsController extends Controller
{
    public function index()
    {

        $posts = NewsPosts::all();
        return view('admin.actueel.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = NewsPosts::create([
            'fulltext' => $request->fulltext,
            'datetime' => date("Y-m-d H:m:s")
        ]);
    }

    public function create()
    {
        return view('admin.actueel.create');
    }

    public function edit(NewsPosts $id)
    {
        return view('admin.actueel.edit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        NewsPosts::find($id)->update([
            'fulltext' => $request->fulltext
        ]);
    }
}
