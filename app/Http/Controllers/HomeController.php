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
}
