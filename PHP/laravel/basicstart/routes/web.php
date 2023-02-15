<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\about;
use App\Http\Controllers\admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//รับค่า Route  จาก controllers
Route::get('/about', [about::class, 'index'])
//การตั่งซื่อ URL route
->name('about')
//การเช็ค สถานะโดย middleware
->middleware('check');

Route::get('/admin', [admin::class, 'index']);


//การส่ง parameter มาด้วย
Route::get('/about/{name}', function ($name) {
    echo $name;
});
