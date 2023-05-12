<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostTaskController extends Controller
{
    public function uploadImage(Request $request)
    {
        $imgpath = request()->file('file')->store('uploads', 'public');
        $url = asset('storage/' . $imgpath);
        return response()->json(['location' => $url]);
    }
}