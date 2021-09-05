<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {

        // $posts = Post::latest()->with('category');

        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query
                ->where('title', 'like' , '%' . $search . '%')
                ->orWhere('body', 'like' , '%' . $search . '%'));

    }

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
