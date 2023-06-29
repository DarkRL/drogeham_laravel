<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageasignPosts extends Model
{
    use HasFactory;
    protected $fillable = ['photo', 'updated_at'];
}
