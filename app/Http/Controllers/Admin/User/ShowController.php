<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(User $user /*называние как в роуте в урл после слеша!! /{category}*/)
    {
        return view('admin.user.show', compact('user'));
    }
}
