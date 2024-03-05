<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag /*приходит из роута*/)
    {
        $tag->delete();
        //return view('admin.tag.show', compact('tag', )); не надо тащить категории, поэтому редирект
        return redirect()->route('admin.tag.index');
    }
}
