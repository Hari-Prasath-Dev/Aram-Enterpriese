<?php

namespace App\Http\Controllers;

use App\Models\Chit;
use App\Models\ChitDetail;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function calendarMain()
    {
        return view('calendar');
    }

    public function chitCreation()
    {
        return view('chit-creation');
    }

    public function createChit()
    {
        return view('create-chit');
    }

    public function customerCreation()
    {
        $users = User::where('role', '!=', 'Admin')->orWhereNull('role')->get();
        return view('customer-creation',compact('users'));
    }

    public function pageError()
    {
        return view('pageError');
    }

    public function faq()
    {
        return view('faq');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function imageUpload()
    {
        return view('imageUpload');
    }

    public function paymentCollection()
    {
        return view('payment-collection');
    }

    public function reports()
    {
        return view('reports');
    }
    public function groupCreation()
    {
        $chits = Chit::withCount('members')->latest()->get();
        $users = User::latest()->get();
        $user_count = User::count();    

        return view('group-creation', compact('chits', 'users','user_count'));
    }


    public function createGroup()
    {
        return view('create-group');
    }

    public function edit($id)
    {
        $group = Chit::with('schemes')->findOrFail($id);

        return view('edit-group', compact('group'));
    }

    public function viewGroup($id)
    {
    $group = Chit::with(['users', 'schemes'])->findOrFail($id);

        return view('group-view', compact('group'));
    }


    public function paymentView($id)
    {
        return view('payment-view', compact('id'));
    }

    public function paymentApproval()
    {
        $chitDetails = ChitDetail::with(['user', 'group'])->get();

        return view('payment-approval', compact('chitDetails'));
    }

    public function actionUpdate()
    {
        $groups = Chit::all();

        // Get the latest auction or first one
        $auction = ChitDetail::latest()->first(); // or ->first() if you want the first record

        return view('action-update', compact('groups', 'auction'));
    }



    public function storeOrUpdate(Request $request)
    {

        ChitDetail::create([
            'group_id' => $request->group_id,
            'auction_count' => $request->auction_count,
            'auction_completed_amount' => $request->auction_completed_amount,
            'dividend' => $request->dividend,
            'payable_amount' => $request->payable_amount,
            'last_date' => $request->last_date,
            'successful_bidder' => $request->successful_bidder,
        ]);

        return redirect()->route('actionUpdateCustomerList')->with('message', 'Auction Created Successfully');
    }



    public function actionUpdateCustomerList()
    {
        return view('action-update-customer-list');
    }
}
