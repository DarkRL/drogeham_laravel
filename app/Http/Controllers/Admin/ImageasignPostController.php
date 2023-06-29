<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\ImageasignPosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageasignPostController extends Controller
{
    public function index()
    {
        $posts = DB::select('SELECT * FROM imageasign_posts WHERE id = ?', ['1']);
        return view('admin.overig.backgroundindex', ['posts' => $posts]);
    }

    public function edit(ImageasignPosts $id)
    {
        return view('admin.overig.backgroundedit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        $beforeUpdate = ImageasignPosts::findOrFail($id);
        if ($request->hasFile('photo')) {
            $imgpath = request()->file('photo')->store('uploads', 'public');
            $url = asset('storage/' . $imgpath);

            Storage::delete('public/uploads/' . basename($beforeUpdate->photo));

            $saved = ImageasignPosts::find($id)->update([
                'photo' => $url
            ]);

            if ($saved) {
                return redirect()->route('admin.imageasign.index')
                    ->withSuccess('Nieuwe afbeelding is succesvol aangepast!');
            }
            return redirect()->route('admin.imageasign.index')
                ->withFail('Er is een probleem opgetreden, afbeelding is niet aangepast!');
        }
        return redirect()->route('admin.imageasign.index')
        ->withSuccess('Afbeelding is niet aangepast!');
    }
}
