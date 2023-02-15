<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin extends Controller
{
    //
    function index(){
        return view('admin.admin');
    }
}
