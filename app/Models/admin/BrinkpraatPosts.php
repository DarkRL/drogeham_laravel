<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrinkpraatPosts extends Model
{
    use HasFactory;
    protected $fillable = ['fulltext', 'updated_at'];
}
