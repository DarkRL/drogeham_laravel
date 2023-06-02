<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\posts\Event;

class AgendaAdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $posts = Event::all();
        return view('admin.agenda.index', ['posts' => $posts]);
    }

    public function create(Request $request)
    {   
        return view('admin.agenda.create', ['start' => $request->start, 'end' => $request->end]);
    }

    public function store(Request $request)
    {
    //    $fulltext = app('App\Http\Controllers\Imagehandler\ImageController')->fixTinymceImageUrl($request->fulltext);

        $newEvent = Event::create([
            'title' => $request->title,
            'fulltext' => $request->fulltext,
            'start' => $request->startdate,
            'end' => $request->enddate
        ]);

        if ($newEvent) {
            return redirect()->route('admin.agenda.index')
                ->withSuccess('Nieuw artikel is succesvol aangemaakt!');
        }

        return redirect()->route('admin.agenda.index')
            ->withErrors('Er is een fout opgetreden, het artikel is niet aangemaakt!');
    }

    public function edit(Event $id)
    {
        return view('admin.agenda.edit', ['post' => $id]);
    }

}
