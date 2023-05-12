<?php

namespace App\Models\posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPosts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['headline', 'fulltext', 'photo', 'datetime'];
}