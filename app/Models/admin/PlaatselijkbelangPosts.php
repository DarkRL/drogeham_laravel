<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaatselijkbelangPosts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['fulltext', 'datetime'];
}
