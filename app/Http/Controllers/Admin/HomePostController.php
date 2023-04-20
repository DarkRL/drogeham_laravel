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

    public function insert(Request $request)
    {
        $email = $request->input('fulltext');
        $data = array('fulltext' => $email);
        DB::table('home_posts')->insert($data);
        return redirect('/admin/home');
    }
}
