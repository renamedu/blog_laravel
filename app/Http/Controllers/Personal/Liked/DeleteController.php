<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);
//        $data = [];
//        $data['usersCount'] = User::all()->count();
//        $data['postsCount'] = Post::all()->count();
//        $data['categoriesCount'] = Category::all()->count();
//        $data['tagsCount'] = Tag::all()->count();
        return redirect()->route('personal.liked.index');
    }
}
