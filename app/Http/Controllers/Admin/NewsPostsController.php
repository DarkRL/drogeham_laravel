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
        // $posts = DB::select('SELECT * FROM news_posts');
        return view('admin.actueel.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $imgpath = request()->file('photo')->store('uploads', 'public');
            $url = asset('storage/' . $imgpath);
        }

        $newPost = NewsPosts::create([
            'headline' => $request->headline,
            'fulltext' => $request->fulltext,
            'photo' => $url,
            'datetime' => date("Y-m-d H:m:s"),
            'public' => 0
        ]);
        return redirect()->route('admin.actueel.index')
            ->withSuccess('Nieuw artikel is succesvol aangemaakt!');
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
        if ($request->hasFile('photo')) {
            $imgpath = request()->file('photo')->store('uploads', 'public');
            $url = asset('storage/' . $imgpath);

            NewsPosts::find($id)->update([
                'photo' => $url
            ]);
        }

        NewsPosts::find($id)->update([
            'headline' => $request->headline,
            'fulltext' => $request->fulltext,
            'datetime' => date("Y-m-d H:m:s")
        ]);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        return redirect()->route('admin.actueel.index');
    }

    public function delete(Request $request, $id)
    {
        NewsPosts::find($id)->delete();
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        return redirect()->route('admin.actueel.index');
    }

    public function publish(Request $request, $id)
    {
        $record = NewsPosts::findOrFail($id);

        $oldValue = $record->public;
        $record->public = $request->publishValue;
        $record->save();

        // return redirect()->route('admin.actueel.index');
        if ($oldValue == 0) {
            $returnMessage =  $request->publishValue == 0 ? "Artikel '{$request->headline}' was al inactief!" : "Artikel '{$request->headline}' is succesvol actief gezet!";
        } else {
            $returnMessage =  $request->publishValue == 0 ? "Artikel '{$request->headline}' is succesvol inactief gezet!" : "Artikel '{$request->headline}' was al actief!";
        }

        return response()->json([
            'success' => true,
            'message' => $returnMessage
        ]);
    }
}
