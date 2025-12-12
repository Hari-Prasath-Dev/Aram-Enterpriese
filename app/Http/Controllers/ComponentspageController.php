<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentspageController extends Controller
{
    public function imageUpload()
    {
        return view('image-upload');
    }
}
