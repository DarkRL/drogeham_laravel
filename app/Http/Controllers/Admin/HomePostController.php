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
        return view('admin.home', ['posts' => $posts]);
    }

    // public function insert(Request $request)
    // {
    //     $email = $request->input('fulltext');
    //     $data = array('fulltext' => $email);
    //     DB::table('home_posts')->insert($data);
    //     return redirect('/admin/home');
    // }

    public function store(Request $request)
    {
        // $request->validate(['photo' => 'required|image|mimes:jpeg,png,webp,png,gif,bmp,tiff|max:8192']);
        // $imgName = date("YmdHms") . 'photo.' . $request->photo->extension();
        // $request->photo->move(public_path('img'), $imgName);
        $newPost = HomePost::create([
            // 'headline' => $request->headline,
            'fulltext' => $request->fulltext,
            // 'photo' => $imgName,
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
