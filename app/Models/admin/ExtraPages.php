<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraPages extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['headline', 'pagename', 'fulltext', 'datetime', 'created_at', 'updated_at'];
}