<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePost extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['fulltext', 'photo', 'datetime'];
}
