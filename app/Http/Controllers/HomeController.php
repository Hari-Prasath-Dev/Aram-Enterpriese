<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function calendarMain()
        {
            return view('calendarMain');
        }

        public function chatEmpty()
        {
            return view('chatEmpty');
        }

    public function chitCreation()
        {
            return view('chitCreation');
        }

    public function createChit()
        {
            return view('createChit');
        }

        public function chatProfile()
        {
            return view('chatProfile');
        }

    public function customerCreation()
        {
            return view('customerCreation');
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
            return view('paymentCollection');
        }

    public function reports()
        {
            return view('reports');
        }

        public function kanban()
        {
            return view('kanban');
        }

        public function pricing()
        {
            return view('pricing');
        }

        public function starred()
        {
            return view('starred');
        }

        public function termsCondition()
        {
            return view('termsCondition');
        }

        public function typography()
        {
            return view('typography');
        }

        public function veiwDetails()
        {
            return view('veiwDetails');
        }

        public function widgets()
        {
            return view('widgets');
        }

}
