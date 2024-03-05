<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Category $category /*приходит из роута*/)
    {
        $category->delete();
        //return view('admin.categories.show', compact('category', )); не надо тащить категории, поэтому редирект
        return redirect()->route('admin.category.index');
    }
}
