<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Post $post /*приходит из роута*/)
    {
        $post->delete();
        //return view('admin.categories.show', compact('category', )); не надо тащить категории, поэтому редирект
        return redirect()->route('admin.post.index');
    }
}
