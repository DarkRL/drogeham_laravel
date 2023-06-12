<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeydinfoPosts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['fulltext', 'updated_at'];
}
