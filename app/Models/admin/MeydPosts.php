<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeydPosts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['headline', 'fulltext', 'datetime'];
}