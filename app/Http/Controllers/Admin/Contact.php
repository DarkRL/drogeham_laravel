<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Contact extends Controller
{
    public function index() {
      $posts = DB::select('SELECT * FROM contact_posts');
      return view('admin.contact.index', ['posts' => $posts]);
    }
}
