<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\posts\ContactPosts;
use Illuminate\Support\Facades\DB;

class Contact extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query('search');

    $posts = ContactPosts::query()
      ->when($search, function ($query, $search) {
        return $query->where('naam', 'like', '%' . $search . '%');
      })
      ->orderBy('id', 'desc')
      ->paginate(15);

    return view('admin.contact.index', compact('posts'));
  }

  public function delete(Request $request, $id)
  {
    $deleted = ContactPosts::find($id)->delete();

    if ($deleted) {
      return response()->json([
        'success' => true,
        'message' => "Persoon '" . $request->headline . "' is succesvol verwijderd!"
      ]);
    }

    return response()->json([
      'success' => false,
      'message' => "Er is iets fout gegaan, Persoon '" . $request->headline . "' is niet verwijderd!"
    ]);
  }
}
