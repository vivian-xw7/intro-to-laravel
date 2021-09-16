<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

// this makes it so you don't have to pass Categories to the post view route

class CategoryDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        // you have to add a categoies variable
        return view('components.category-dropdown', [
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
}
