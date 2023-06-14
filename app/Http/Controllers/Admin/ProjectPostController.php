<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\admin\ProjectPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectPostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $posts = ProjectPost::query()
            ->when($search, function ($query, $search) {
                return $query->where('headline', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(15);
    
        return view('admin.projecten.index', compact('posts'));
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
            'fulltext' => $fulltext ?? " ",
            'photo' => $url,
            'updated_at' => date("Y-m-d H:m:s"),
            'created_at' => date("Y-m-d H:m:s"),
            'public' => 0
        ]);

        if ($newPost) {
            return redirect()->route('admin.projecten.index')
                ->withSuccess('Project "' . $request->headline . '" is succesvol aangemaakt!');
        }

        return redirect()->route('admin.projecten.index')
            ->withErrors('Er is een error ontstaan, artikel "' . $request->headline . '" is niet aangemaakt!');
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
        $beforeUpdate = ProjectPost::findOrFail($id);
        if ($request->hasFile('photo')) {
            $imgpath = request()->file('photo')->store('uploads', 'public');
            $url = asset('storage/' . $imgpath);

            Storage::delete('public/uploads/' . basename($beforeUpdate->photo));

            ProjectPost::find($id)->update([
                'photo' => $url
            ]);
        }

        $saved = ProjectPost::find($id)->update([
            'headline' => $request->headline,
            'fulltext' => $request->fulltext ?? " ",
            'updated_at' => date("Y-m-d H:m:s"),
        ]);
        $afterUpdate = ProjectPost::findOrFail($id);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);

        if ($saved) {
            return redirect()->route('admin.projecten.index')
                ->withSuccess('Project "' . $request->headline . '" is succesvol aangepast!');
        }
        return redirect()->route('admin.projecten.index')
            ->withFail('Er is een probleem opgetreden, project "' . $request->headline . '" is niet aangepast!');
    }

    public function delete(Request $request, $id)
    {
        $beforeDel = ProjectPost::findOrFail($id);
        $deleted = ProjectPost::find($id)->delete();
        Storage::delete('public/uploads/' . basename($beforeDel->photo));

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => "Het project '" . $request->headline . "' is succesvol verwijderd!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Er is iets fout gegaan, Het project '" . $request->headline . "' is niet verwijderd!"
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
                'message' => $request->publishValue == 0 ? "Project '{$request->headline}' is succesvol inactief gezet!" : "Project '{$request->headline}' is succesvol actief gezet!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Er is iets fout gegaan, project '{$request->headline}' kon niet op actief/inactief worden gezet"
        ]);
    }
}
