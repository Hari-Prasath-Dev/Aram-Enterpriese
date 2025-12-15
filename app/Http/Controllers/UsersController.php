<?php

namespace App\Http\Controllers;

use App\Models\Chit;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function addUser()
    {
        $chits = Chit::all();
        return view('add-user', compact('chits'));
    }

    public function store(Request $request)
    {
        $pin = $request->input('pin-1') . $request->input('pin-2') . $request->input('pin-3') . $request->input('pin-4');

        // Create customer
        User::create([
            'name' => $request->name,
            'mobile' => $request->phone,
            'email' => $request->email,
            'location' => $request->location,
            'nominee_name' => $request->nominee_name,
            'nominee_number' => $request->nominee_number,
            'pin_number' => $pin,
            'chit_id' => $request->chit_group,
        ]);

        return redirect()->route('customerCreation')->with('success', 'Customer created successfully!');
    }

    public function usersGrid()
    {
        return view('users/usersGrid');
    }
    
    public function usersList()
    {
        return view('users/usersList');
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
        $user = User::with('bankDetail')->findOrFail($id);

        return view('user-details', compact('user'));
    }

    public function destroy($id)
    {
        // Find the user
        $user = User::with('bankDetail')->findOrFail($id);

        // Delete the bankDetail first if exists
        if ($user->bankDetail) {
            $user->bankDetail->delete();
        }

        // Delete the user
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User and bank details deleted successfully.'
        ]);
    }


}
