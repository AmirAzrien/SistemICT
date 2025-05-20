<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HubungiController extends Controller
{
    public function index()
    {
        // Return the view for the contact page
        return view('hubungi.hubungi');
    }
}
