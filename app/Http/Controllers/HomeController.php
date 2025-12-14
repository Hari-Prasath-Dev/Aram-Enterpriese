<?php

namespace App\Http\Controllers;

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
    return view('group-creation');
}

public function createGroup()
{
    return view('create-group');
}

public function editGroup($id)
{
    return view('edit-group', compact('id'));
}

public function viewGroup($id)
{
    return view('group-view', compact('id'));
}

    public function paymentView($id)
    {
        return view('payment-view', compact('id'));
    }

    public function paymentApproval()
    {
        return view('payment-approval');
    }

    public function actionUpdate()
    {
        return view('action-update');
    }

    public function actionUpdateCustomerList()
    {
        return view('action-update-customer-list');
    }
}
