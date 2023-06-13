<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DisclaimerPosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DisclaimerPostController extends Controller
{
    public function index()
    {
        $posts = DB::select('SELECT * FROM disclaimer_posts WHERE id = ?' , ['1']);
        return view('admin.overig.disclaimerindex', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $newPost = DisclaimerPosts::create([
            'fulltext' => $request->fulltext ?? " ",
            'updated_at' => date("Y-m-d H:m:s")
        ]);

        if($newPost){
            return redirect()->route('admin.disclaimer.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangemaakt!');
        }
        return redirect()->route('admin.disclaimer.index')
        ->withFail('Er is een probleem opgetreden, nieuw infoblok is niet aangemaakt!');
    }

    public function create()
    {
        $id = 1;
        if (DisclaimerPosts::where('id', $id)->exists()) {
            return redirect()->route('admin.disclaimer.index');
        }
        return view('admin.overig.disclaimercreate');
    }

    public function edit(DisclaimerPosts $id)
    {
        return view('admin.overig.disclaimeredit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        $beforeUpdate = DisclaimerPosts::findOrFail($id);
        $saved = DisclaimerPosts::find($id)->update([
            'fulltext' => $request->fulltext ?? " "
        ]);
        $afterUpdate = DisclaimerPosts::findOrFail($id);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);
        
        if($saved){
            return redirect()->route('admin.disclaimer.index')
            ->withSuccess('Nieuwe inhoud is succesvol aangepast!');
        }
        return redirect()->route('admin.disclaimer.index')
        ->withFail('Er is een probleem opgetreden, inhoud is niet aangepast!');
    }
}
