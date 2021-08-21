<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // this prevents mass-assignment
    protected $guarded = [];

    // protected $guarded = ['id'];

    // this is the opposite of guarded
    // protected $fillable = ['title', 'excerpt', 'body'];

}
