<?php

namespace App\Http\Controllers;

use App\Models\Chit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormsController extends Controller
{
    public function formValidation($id)
    {
        $user  = User::findOrFail($id); 
        $chits = Chit::all();
        return view('form-validation',compact('chits','user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $pin = implode('', $request->pin); // 1234

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->phone,
            'location' => $request->location,
            'nominee_name' => $request->nominee_name,
            'nominee_number' => $request->nominee_number,
            'pin_number' => $pin,
            'chit_id' => $request->chit_group,
        ]);

        return redirect()->route('customerCreation')->with('success', 'Customer updated successfully!');

    }

    public function updatePin(Request $request, $id)
    {
        $pin = implode('', $request->pin);
        $confirmPin = implode('', $request->confirm_pin);

        if ($pin !== $confirmPin) {
            return back()->withErrors(['pin' => 'PIN and Confirm PIN must match'])
                        ->with('show_pin_modal', true); // flag to reopen modal
        }

        $user = User::findOrFail($id);
        $user->pin_number = $pin;
        $user->save();

        return back()->with('success', 'PIN updated successfully');
    }




}
