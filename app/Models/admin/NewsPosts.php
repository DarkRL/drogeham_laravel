<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPosts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['headline', 'fulltext', 'photo', 'updated_at', 'created_at'];
}
