<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\ExtraPages;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExtraPagesAdminController extends Controller
{
    public function index()
    {
        $posts = ExtraPages::all();
        return view('admin.extra.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.extra.create');
    }

    public function store(Request $request)
    {
        $count = DB::table('extra_pages')
            ->where('pagename', str_replace(' ', '-', $request->pagename))
            ->count();

        if ($count > 0) {
            return redirect()->route('admin.extra.create')
                ->withFail('"' . $request->pagename . '" bestaat al, kies een andere naam!');
        }

        $fulltext = app('App\Http\Controllers\Imagehandler\ImageController')->fixTinymceImageUrl($request->fulltext);

        $newPost = ExtraPages::create([
            'headline' => $request->headline,
            'pagename' => str_replace(' ', '-', $request->pagename),
            'fulltext' => $fulltext ?? " ",
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);

        if ($newPost) {
            return redirect()->route('admin.extra.index')
                ->withSuccess('"' . $request->headline . '" is succesvol aangemaakt!');
        }

        return redirect()->route('admin.extra.index')
            ->withFail('Er is een error ontstaan, "' . $request->headline . '" kon niet aangemaakt worden!');
    }

    public function delete($id)
    {
        $beforeDel = ExtraPages::findOrFail($id);
        $deleted = ExtraPages::find($id)->delete();
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeDel->fulltext, '');
        return redirect()->route('admin.extra.index');
    }

    public function edit(ExtraPages $id)
    {
        return view('admin.extra.edit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        $beforeUpdate = ExtraPages::where('pagename', str_replace(' ', '-', $request->pagename))->first();

        $saved = ExtraPages::find($id)->update([
            'headline' => $request->headline,
            'pagename' => str_replace(' ', '-', $request->pagename),
            'fulltext' => $request->fulltext ?? " ",
            'updated_at' => date("Y-m-d H:m:s")
        ]);

        $afterUpdate = ExtraPages::findOrFail($beforeUpdate->id);

        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);

        if ($saved) {
            return redirect()->route('admin.extra.index')
                ->withSuccess('"' . $request->headline . '" is succesvol aangepast!');
        }
        return redirect()->route('admin.extra.index')
            ->withFail('Er is een probleem opgetreden, "' . $request->headline . '" kon niet aangepast worden!');
    }
}
