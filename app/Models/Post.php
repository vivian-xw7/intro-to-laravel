<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        // post belongs to a category
        return $this->belongsTo(Category::class);
    }

    // users?
    // laravel assumes user() will have a foreign key of user_id. Used in post.blade
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
