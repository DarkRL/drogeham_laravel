<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\NewsPosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NewsPostsController extends Controller
{
    public function index()
    {
        $posts = DB::table('news_posts')->paginate(15);
        return view('admin.actueel.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate(['photo' => 'required|image|mimes:jpeg,png,webp,png,gif,bmp,tiff|max:8192']);
        if ($request->hasFile('photo')) {
            $imgpath = request()->file('photo')->store('uploads', 'public');
            $url = asset('storage/' . $imgpath);
        }

       $fulltext = app('App\Http\Controllers\Imagehandler\ImageController')->fixTinymceImageUrl($request->fulltext);

        $newPost = NewsPosts::create([
            'headline' => $request->headline,
            'fulltext' => $fulltext,
            'photo' => $url,
            'updated_at' => date("Y-m-d H:m:s"),
            'created_at' => date("Y-m-d H:m:s"),
            'public' => 0
        ]);

        if ($newPost) {
            return redirect()->route('admin.actueel.index')
                ->withSuccess('Nieuw artikel is succesvol aangemaakt!');
        }

        return redirect()->route('admin.actueel.index')
            ->withErrors('Er is een fout opgetreden, het artikel is niet aangemaakt!');
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
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        // app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        return redirect()->route('admin.actueel.index');
    }

    public function delete(Request $request, $id)
    {
        $deleted = NewsPosts::find($id)->delete();
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => "Artikel " . $request->headline . " is succesvol verwijderd!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Er is iets fout gegaan, Artikel " . $request->headline . " is niet verwijderd!"
        ]);
    }

    public function publish(Request $request, $id)
    {
        $record = NewsPosts::findOrFail($id);

        $record->public = $request->publishValue;
        $saved = $record->save();

        if ($saved) {
            return response()->json([
                'success' => true,
                'message' => $request->publishValue == 0 ? "Artikel '{$request->headline}' is succesvol inactief gezet!" : "Artikel '{$request->headline}' is succesvol actief gezet!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Er is iets fout gegaan, artikel '{$request->headline}' kon niet op actief/inactief worden gezet"
        ]);
    }
}
