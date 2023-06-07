<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\admin\ProjectPost;
use Illuminate\Http\Request;

class ProjectPostController extends Controller
{
    public function index()
    {
        $posts = DB::table('project_posts')->paginate(15);
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
            'updated_at' => date("Y-m-d H:m:s"),
            'created_at' => date("Y-m-d H:m:s"),
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
            'updated_at' => date("Y-m-d H:m:s"),
        ]);
        // app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        return redirect()->route('admin.projecten.index');
    }

    public function delete(Request $request, $id)
    {
        $deleted = ProjectPost::find($id)->delete();
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => "Bestand " . $request->headline . " is succesvol verwijderd!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Er is iets fout gegaan, Bestand " . $request->headline . " is niet verwijderd!"
        ]);
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
