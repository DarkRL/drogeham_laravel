<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaAdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.agenda.index');
    }
}
