<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function addUser()
    {
        return view('add-user');
    }
    
    public function viewProfile()
    {
        return view('profile');
    }

    public function viewUser()
    {
        return view('user-details');
    }
}
