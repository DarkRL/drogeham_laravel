<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaatselijkbelangfilePosts extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'filepath', 'datetime', 'updated_at', 'created_at', 'public'];
}
