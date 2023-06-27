<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\BrinkpraatPosts;
use App\Models\admin\BrinkpraatfilePosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrinkpraatPostController extends Controller
{
    public function index(Request $request)
    {
        $posts = DB::select('SELECT * FROM brinkpraat_posts WHERE id = ?', ['1']);
        
        $search = $request->query('search');

        $posts_files = BrinkpraatfilePosts::query()
            ->when($search, function ($query, $search) {
                return $query->where('filename', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('admin.brinkpraat.index', ['posts' => $posts, 'posts_files' => $posts_files]);
    }

    public function store(Request $request)
    {
        $newPost = BrinkpraatPosts::create([
            'fulltext' => $request->fulltext ?? " ",
            'datetime' => date("Y-m-d H:m:s")
        ]);
        if ($newPost) {
            return redirect()->route('admin.brinkpraat.index')
                ->withSuccess('Nieuwe inhoud is succesvol aangemaakt!');
        }
        return redirect()->route('admin.brinkpraat.index')
            ->withFail('Er is een probleem opgetreden, inhoud is niet goed aangemaakt!');
    }

    public function create()
    {
        $id = 1;
        if (BrinkpraatPosts::where('id', $id)->exists()) {
            return redirect()->route('admin.brinkpraat.index');
        }
        return view('admin.brinkpraat.create');
    }

    public function edit(BrinkpraatPosts $id)
    {
        return view('admin.brinkpraat.edit', ['post' => $id]);
    }

    public function update(Request $request, $id)
    {
        $beforeUpdate = BrinkpraatPosts::findOrFail($id);
        $saved = BrinkpraatPosts::find($id)->update([
            'fulltext' => $request->fulltext ?? " "
        ]);
        $afterUpdate = BrinkpraatPosts::findOrFail($id);

        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);

        if ($saved) {
            return redirect()->route('admin.brinkpraat.index')
                ->withSuccess('Nieuwe inhoud is succesvol aangepast!');
        }
        return redirect()->route('admin.brinkpraat.index')
            ->withFail('Er is een probleem opgetreden, inhoud is niet goed aangepast!');
    }

    //-------\\

    public function store_files(Request $request)
    {
        $url = 'Undefined';
        if ($request->hasFile('filepath')) {
            $request->validate([
                'filepath' => 'required|mimes:pdf,xlx,csv|max:8000',
            ]);

            $filepath = request()->file('filepath')->store('files', 'public');
            $url = asset('storage/' . $filepath);
        }

        $newPost = BrinkpraatfilePosts::create([
            'filename' => $request->filename,
            'filepath' => $url,
            'datetime' => $request->datetime,
            'updated_at' => date("Y-m-d H:m:s"),
            'created_at' => date("Y-m-d H:m:s")
        ]);
        if ($newPost) {
            return redirect()->route('admin.brinkpraat.index')
                ->withSuccess('Nieuw bestand is succesvol aangemaakt!');
        }
        return redirect()->route('admin.brinkpraat.index')
            ->withFail('Er is een probleem opgetreden, bestand is niet aangemaakt!');
    }

    public function create_files()
    {
        return view('admin.brinkpraat.create_file');
    }

    public function edit_files(BrinkpraatfilePosts $id)
    {
        return view('admin.brinkpraat.edit_file', ['post' => $id]);
    }

    public function update_files(Request $request, $id)
    {
        if ($request->hasFile('filepath')) {
            $request->validate([
                'filepath' => 'required|mimes:pdf,xlx,csv|max:8000',
            ]);

            $fileName = time() . '.' . $request->filepath->extension();

            $beforeUpdate = BrinkpraatfilePosts::findOrFail($id);
            Storage::delete('public/files/' . basename($beforeUpdate->filepath));

            $url = request()->file('filepath')->store('files', 'public');

            BrinkpraatfilePosts::find($id)->update([
                'filepath' => $url
            ]);
        }

        $saved = BrinkpraatfilePosts::find($id)->update([
            'filename' => $request->filename,
            'datetime' => $request->datetime,
            'updated_at' => date("Y-m-d H:m:s"),
        ]);

        if ($saved) {
            return redirect()->route('admin.brinkpraat.index')
                ->withSuccess('Nieuw bestand is succesvol aangepast!');
        }
        return redirect()->route('admin.brinkpraat.index')
            ->withFail('Er is een probleem opgetreden, bestand is niet goed aangepast!');
    }

    public function publish_files(Request $request, $id)
    {
        $record = BrinkpraatfilePosts::findOrFail($id);

        $record->public = $request->publishValue;
        $saved = $record->save();

        if ($saved) {
            return response()->json([
                'success' => true,
                'message' => $request->publishValue == 0 ? "Bestand '{$record->filename}' is succesvol inactief gezet!" : "Bestand '{$record->filename}' is succesvol actief gezet!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Er is iets fout gegaan, Bestand '{$record->filename}' kon niet op actief/inactief worden gezet"
        ]);
    }


    public function delete_files(Request $request, $id)
    {
        $beforeDel = BrinkpraatfilePosts::findOrFail($id);
        $deleted = BrinkpraatfilePosts::find($id)->delete();
        Storage::delete('public/files/' . basename($beforeDel->filepath));

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => "Bestand " . $request->filename . " is succesvol verwijderd!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Er is iets fout gegaan, Bestand " . $request->filename . " is niet verwijderd!"
        ]);
    }
}
