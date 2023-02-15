<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class about extends Controller
{
    //
    function index(){

        //การส่งตัวเเปลไปเเสดงในหน้า about
        $address = "กรุงเทพ";
        $tel = "061-935-8134";
        // return view('about',compact('address','tel'));

        return view('about')
        ->with('address',$address)
        ->with('tel',$tel);
    }
}
