<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function addUser()
    {
        return view('add-user');
    }

    public function editUser($id)
    {
        return view('edit-user', ['id' => $id]);
    }
    
    public function viewProfile()
    {
        return view('profile');
    }

    public function viewUser($id)
    {
        return view('user-details', ['id' => $id]);
    }
    public function usersGrid()
    {
        return view('users/usersGrid');
    }
   
    public function usersList()
    {
        return view('users/usersList');
    }
   

 

}
