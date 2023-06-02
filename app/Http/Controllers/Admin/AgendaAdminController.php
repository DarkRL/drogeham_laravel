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

}
