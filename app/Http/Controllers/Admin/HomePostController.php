<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomePost;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePostController extends Controller
{
    public function index()
    {
        $posts = HomePost::all();
        return view('admin.home.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = HomePost::create([
            'fulltext' => $request->fulltext,
            'datetime' => date("Y-m-d H:m:s")
        ]);
    }

    public function create()
    {
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
    }
}
