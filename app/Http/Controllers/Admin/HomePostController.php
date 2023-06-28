<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\HomePost;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePostController extends Controller
{
    public function index()
    {
        $posts = DB::select('SELECT * FROM home_posts WHERE id = ?' , ['1']);
        return view('admin.home.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = HomePost::create([
            'fulltext' => $request->fulltext ?? " ",
            'datetime' => date("Y-m-d H:m:s")
        ]);

        if($newPost){
            return redirect()->route('admin.home.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangemaakt!');
        }
        return redirect()->route('admin.home.index')
        ->withFail('Er is een probleem opgetreden, nieuw infoblok is niet aangemaakt!');
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
        $beforeUpdate = HomePost::findOrFail($id);
        if ($request->hasFile('photo')) {
            $imgpath = request()->file('photo')->store('uploads', 'public');
            $url = asset('storage/' . $imgpath);

            Storage::delete('public/uploads/' . basename($beforeUpdate->photo));

            HomePost::find($id)->update([
                'photo' => $url
            ]);
        }

        $saved = HomePost::find($id)->update([
            'fulltext' => $request->fulltext ?? " "
        ]);
        $afterUpdate = HomePost::findOrFail($id);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);
        
        if($saved){
            return redirect()->route('admin.home.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangepast!');
        }
        return redirect()->route('admin.home.index')
        ->withFail('Er is een probleem opgetreden, inhoud is niet aangepast!');
    }
}
