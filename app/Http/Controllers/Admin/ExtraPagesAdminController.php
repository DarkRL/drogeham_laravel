<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\ExtraPages;
use Illuminate\Http\Request;

class ExtraPagesAdminController extends Controller
{
    //
    public function index()
    {
        $posts = ExtraPages::all();
        return view('admin.extra.index', ['posts' => $posts]);
    }
    
}
