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
        $start = $request->input('start');
        $end = $request->input('end');

        $dates = [
            'start' => $start,
            'end' => $end
        ];
        
        return view('admin.agenda.create', ['dates' => $dates]);
    }

}
