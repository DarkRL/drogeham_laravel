<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\ProjectPost;
use Illuminate\Http\Request;

class ProjectPostController extends Controller
{
    public function index()
    {
        $posts = ProjectPost::all();
        // $posts = DB::select('SELECT * FROM news_posts');
        return view('admin.projecten.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate(['photo' => 'required|image|mimes:jpeg,png,webp,png,gif,bmp,tiff|max:8192']);
        if ($request->hasFile('photo')) {
            $imgpath = request()->file('photo')->store('uploads', 'public');
            $url = asset('storage/' . $imgpath);
        }

       $fulltext = app('App\Http\Controllers\Imagehandler\ImageController')->fixTinymceImageUrl($request->fulltext);

        $newPost = ProjectPost::create([
            'headline' => $request->headline,
            'fulltext' => $fulltext,
            'photo' => $url,
            'datetime' => date("Y-m-d H:m:s"),
            'public' => 0
        ]);

        if ($newPost) {
            return redirect()->route('admin.projecten.index')
                ->withSuccess('Nieuw artikel is succesvol aangemaakt!');
        }

        return redirect()->route('admin.projecten.index')
            ->withErrors('Er is een error ontstaan, het artikel is niet aangemaakt!');
    }

    public function create()
    {
        return view('admin.projecten.create');
    }

    public function edit(ProjectPost $id)
    {
        return view('admin.projecten.edit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('photo')) {
            $imgpath = request()->file('photo')->store('uploads', 'public');
            $url = asset('storage/' . $imgpath);

            ProjectPost::find($id)->update([
                'photo' => $url
            ]);
        }

        ProjectPost::find($id)->update([
            'headline' => $request->headline,
            'fulltext' => $request->fulltext,
            'datetime' => date("Y-m-d H:m:s")
        ]);
        // app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        return redirect()->route('admin.projecten.index');
    }

    public function delete(Request $request, $id)
    {
        ProjectPost::find($id)->delete();
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        return redirect()->route('admin.projecten.index');
    }

    public function publish(Request $request, $id)
    {
        $record = ProjectPost::findOrFail($id);

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
