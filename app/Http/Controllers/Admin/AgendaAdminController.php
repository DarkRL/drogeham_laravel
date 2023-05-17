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
        if($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
       }

       return view('admin.agenda.index');
    }

    public function ajax(Request $request)

    {
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'fulltext' => ' ',
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'fulltext' => ' ',
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

           case 'delete':
              $event = Event::find($request->id)->delete();

              return response()->json($event);
             break;

           default:

             # code...

             break;

        }

    }
}
