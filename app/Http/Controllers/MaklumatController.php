<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaklumatController extends Controller
{
    public function index()
    {
        // Return the view for the contact page
        return view('maklumat.maklumat');
    }}
