<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\PrivacyPosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PrivacyPostController extends Controller
{
    public function index()
    {
        $posts = DB::select('SELECT * FROM privacy_posts WHERE id = ?' , ['1']);
        return view('admin.overig.privacyindex', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = PrivacyPosts::create([
            'fulltext' => $request->fulltext ?? " ",
            'updated_at' => date("Y-m-d H:m:s")
        ]);

        if($newPost){
            return redirect()->route('admin.privacy.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangemaakt!');
        }
        return redirect()->route('admin.privacy.index')
        ->withFail('Er is een probleem opgetreden, nieuw infoblok is niet aangemaakt!');
    }

    public function create()
    {
        $id = 1;
        if (PrivacyPosts::where('id', $id)->exists()) {
            return redirect()->route('admin.privacy.index');
        }
        return view('admin.overig.privacycreate');
    }

    public function edit(PrivacyPosts $id)
    {
        return view('admin.overig.privacyedit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        $beforeUpdate = PrivacyPosts::findOrFail($id);
        $saved = PrivacyPosts::find($id)->update([
            'fulltext' => $request->fulltext ?? " "
        ]);
        $afterUpdate = PrivacyPosts::findOrFail($id);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);
        
        if($saved){
            return redirect()->route('admin.privacy.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangepast!');
        }
        return redirect()->route('admin.privacy.index')
        ->withFail('Er is een probleem opgetreden, inhoud is niet aangepast!');
    }
}
