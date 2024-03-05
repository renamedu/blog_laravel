<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Category $category /*называние как в роуте в урл после слеша!! /{category}*/)
    {
        return view('admin.categories.show', compact('category'));
    }
}
