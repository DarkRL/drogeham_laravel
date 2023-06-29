<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\posts\Event;
use DateTime;
use DateInterval;

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
        $end_date = new DateTime($request->end);
        $end_date->sub(new DateInterval('P1D'));
        $end_date = $end_date->format('Y-m-d');

        return view('admin.agenda.create', ['start' => $request->start, 'end' => $end_date]);
    }

    public function store(Request $request)
    {
        $fulltext = app('App\Http\Controllers\Imagehandler\ImageController')->fixTinymceImageUrl($request->fulltext);

        $end_date = new DateTime($request->enddate);
        $end_date->add(new DateInterval('P1D'));
        $end_date = $end_date->format('Y-m-d');

        $newEvent = Event::create([
            'title' => $request->title,
            'fulltext' => $fulltext ?? " ",
            'start' => $request->startdate,
            'end' => $end_date
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
        $end_date = new DateTime($id->end);
        $end_date->sub(new DateInterval('P1D'));
        $end_date = $end_date->format('Y-m-d');

        return view('admin.agenda.edit', ['post' => $id, 'end' => $end_date]);
    }

    public function update(Request $request, $id)
    {
        $fulltext = app('App\Http\Controllers\Imagehandler\ImageController')->fixTinymceImageUrl($request->fulltext);
        $beforeUpdate = Event::findOrFail($id);

        $end_date = new DateTime($request->enddate);
        $end_date->add(new DateInterval('P1D'));
        $end_date = $end_date->format('Y-m-d');

        Event::find($id)->update([
            'title' => $request->title,
            'fulltext' => $fulltext ?? " ",
            'start' => $request->startdate,
            'end' => $end_date
        ]);
        $afterUpdate = Event::findOrFail($id);
        app('App\Http\Controllers\Imagehandler\ImageController')->deleteUnusedImages($beforeUpdate->fulltext, $afterUpdate->fulltext);

        return redirect()->route('admin.agenda.index');
    }

    public function delete(Request $request)
    {
        $deleted = Event::find($request->del_id)->delete();
        return response()->json($deleted);
    }

    public function eventdragajax(Request $request, $id)
    {
        Event::find($id)->update([
            'start' => $request->start,
            'end' => $request->end
        ]);

        return response()->json([
            'success' => 'success'
        ]);
    }

    public function eventajax(Request $request, $id) // query for ajax call to load calendar event data
    {
        $post = Event::findOrFail($id);
        $fulltext = $post->fulltext ?? " ";

        return response()->json([
            'text' => $fulltext
        ]);
    }
}
