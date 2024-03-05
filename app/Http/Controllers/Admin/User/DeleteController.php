<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(User $user /*приходит из роута*/)
    {
        $user->delete();
        //return view('admin.categories.show', compact('category', )); не надо тащить категории, поэтому редирект
        return redirect()->route('admin.user.index');
    }
}
