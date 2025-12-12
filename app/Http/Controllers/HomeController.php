<?php

namespace App\Http\Controllers;

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
        return view('customer-creation');
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
