<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageAdminController extends Controller
{
    public function index($admin) {
        return view("admin/".$admin);
    }
}
