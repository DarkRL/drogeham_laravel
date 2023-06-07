<?php

namespace App\Models\posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPosts extends Model
{
    use HasFactory;
    protected $fillable = ['naam', 'email', 'tel', 'bericht', 'created_at' , 'updated_at'];
}
