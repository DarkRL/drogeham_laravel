<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\MeydPosts;
use Illuminate\Http\Request;

class MeydPostsController extends Controller
{
    public function index()
    {
        $posts = MeydPosts::all();
        return view('admin.meyd.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $fulltext = app('App\Http\Controllers\Imagehandler\ImageController')->fixTinymceImageUrl($request->fulltext);

        $newPost = MeydPosts::create([
            'headline' => $request->headline,
            'pagename' => $request->pagename,
            'fulltext' => $fulltext,
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at'=> date("Y-m-d H:m:s"),
            'public' => 0
        ]);

        if ($newPost) {
            return redirect()->route('admin.meyd.index')
                ->withSuccess('Nieuw artikel is succesvol aangemaakt!');
        }

        return redirect()->route('admin.meyd.index')
            ->withErrors('Er is een error ontstaan, het artikel is niet aangemaakt!');
    }

    public function create()
    {
        return view('admin.meyd.create');
    }

    public function edit(MeydPosts $id)
    {
        return view('admin.meyd.edit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        $beforeUpdate = MeydPosts::where('pagename', $request->pagename)->first();
        MeydPosts::find($id)->update([
            'headline' => $request->headline,
            'pagename' => $request->pagename,
            'fulltext' => $request->fulltext,
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        $afterUpdate = MeydPosts::where('pagename', $request->pagename)->first();
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);
        return redirect()->route('admin.meyd.index');
    }

    public function delete(Request $request, $id)
    {
        MeydPosts::find($id)->delete();
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages();
        return redirect()->route('admin.meyd.index');
    }

    public function publish(Request $request, $id)
    {
        $record = MeydPosts::findOrFail($id);

        $record->public = $request->publishValue;
        $saved = $record->save();

        if ($saved) {
            return response()->json([
                'success' => true,
                'message' => $request->publishValue == 0 ? "Pagina '{$request->headline}' is succesvol inactief gezet!" : "Artikel '{$request->headline}' is succesvol actief gezet!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Er is iets fout gegaan, pagina '{$request->headline}' kon niet op actief/inactief worden gezet"
        ]);
    }
}
