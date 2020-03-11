<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function posts(User $user) {
        return $user->posts()->paginate();
    }
}
