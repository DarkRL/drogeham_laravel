<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageAdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view("admin/dashboard");
        } else {
            return redirect()->route('login')
                ->withErrors([
                    'email' => 'Log in op bij het administrator paneel te komen.',
                ])->onlyInput('email');
        }
    }
}
