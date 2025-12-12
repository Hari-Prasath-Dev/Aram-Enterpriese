<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function formValidation()
    {
        return view('form-validation');
    }
}
