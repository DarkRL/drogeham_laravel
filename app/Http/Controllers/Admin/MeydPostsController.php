<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\MeydPosts;
use App\Models\admin\MeydinfoPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeydPostsController extends Controller
{
    public function index(Request $request)
    {
        $posts_info = DB::select('SELECT * FROM meydinfo_posts WHERE id = ?', ['1']);
        
        $search = $request->query('search');

        $posts = MeydPosts::query()
            ->when($search, function ($query, $search) {
                return $query->where('headline', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(15);
    
        // return view('admin.actueel.index', compact('posts'));

        return view('admin.meyd.index', ['posts' => $posts, 'posts_info' => $posts_info]);
    }

    public function store(Request $request)
    {
        $count = DB::table('meyd_posts')
            ->where('pagename', str_replace(' ', '-', $request->pagename))
            ->count();

        if ($count > 0) {
            return redirect()->route('admin.meyd.edit')
                ->withFail('"' . $request->pagename . '" bestaat al, kies een andere naam!');
        }

        $fulltext = app('App\Http\Controllers\Imagehandler\ImageController')->fixTinymceImageUrl($request->fulltext);

        $newPost = MeydPosts::create([
            'headline' => $request->headline,
            'pagename' => str_replace(' ', '-', $request->pagename),
            'fulltext' => $fulltext ?? " ",
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'public' => 0
        ]);

        if ($newPost) {
            return redirect()->route('admin.meyd.index')
                ->withSuccess('"' . $request->headline . '" is succesvol aangemaakt!');
        }

        return redirect()->route('admin.meyd.index')
            ->withFail('Er is een error ontstaan, "' . $request->headline . '" kon niet aangemaakt worden!');
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
        $beforeUpdate = MeydPosts::where('pagename', str_replace(' ', '-', $request->pagename))->first();

        $saved = MeydPosts::find($id)->update([
            'headline' => $request->headline,
            'pagename' => str_replace(' ', '-', $request->pagename),
            'fulltext' => $request->fulltext ?? " ",
            'updated_at' => date("Y-m-d H:m:s")
        ]);

        $afterUpdate = MeydPosts::findOrFail($beforeUpdate->id);

        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);

        if ($saved) {
            return redirect()->route('admin.meyd.index')
                ->withSuccess('"' . $request->headline . '" is succesvol aangepast!');
        }
        return redirect()->route('admin.meyd.index')
            ->withFail('Er is een probleem opgetreden, "' . $request->headline . '" kon niet aangepast worden!');
    }

    public function delete($id)
    {
        $beforeDel = MeydPosts::findOrFail($id);
        $deleted = MeydPosts::find($id)->delete();
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeDel->fulltext, '');
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
                'message' => $request->publishValue == 0 ? "Pagina '{$request->headline}' is succesvol inactief gezet!" : "Pagina '{$request->headline}' is succesvol actief gezet!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Er is iets fout gegaan, pagina '{$request->headline}' kon niet op actief/inactief worden gezet"
        ]);
    }

    ////

    public function store_info(Request $request)
    {
        $newPost = MeydinfoPosts::create([
            'fulltext' => $request->fulltext ?? " ",
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        if ($newPost) {
            return redirect()->route('admin.meyd.index')
                ->withSuccess('De inhoud voor algemene info MEYD is succesvol aangemaakt!');
        }
        return redirect()->route('admin.meyd.index')
            ->withFail('Er is een probleem opgetreden, inhoud algemene info MEYD is niet aangemaakt!');
    }

    public function create_info()
    {
        $id = 1;
        if (MeydinfoPosts::where('id', $id)->exists()) {
            return redirect()->route('admin.meyd.index');
        }
        return view('admin.meyd.create_info');
    }

    public function edit_info(MeydinfoPosts $id)
    {
        return view('admin.meyd.edit_info', ['post' => $id]);
    }

    public function update_info(Request $request, $id)
    {
        $beforeUpdate = MeydinfoPosts::findOrFail($id);
        $saved = MeydinfoPosts::find($id)->update([
            'fulltext' => $request->fulltext ?? " "
        ]);
        $afterUpdate = MeydinfoPosts::findOrFail($id);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);

        if ($saved) {
            return redirect()->route('admin.meyd.index')
                ->withSuccess('De inhoud voor algemene info MEYD is succesvol aangepast!');
        }
        return redirect()->route('admin.meyd.index')
            ->withFail('Er is een probleem opgetreden, inhoud algemene info MEYD is niet aangepast!');
    }
}
