<?php

use Illuminate\Support\Facades\Route;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\servicesController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        //ดึงข้อมูลมาจาก database Query Builder
        $users = DB::table('users')->get();

        //ดึงข้อมูลมาจาก models Users
        // $users = User::all();
        return view('dashboard',compact('users'));
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //Department
    Route::get('/department/all', [DepartmentController::class,'index'])->name('department');
    Route::post('/department/add', [DepartmentController::class,'store'])->name('addDepartment');
    Route::get('/department/edit/{id}', [DepartmentController::class,'edit']);
    Route::post('/department/update/{id}', [DepartmentController::class,'update']);
    
    //softDelete
    Route::get('/department/softdelete/{id}', [DepartmentController::class,'softdelete']);
    Route::get('/department/restore/{id}', [DepartmentController::class,'restore']);
    Route::get('/department/delete/{id}', [DepartmentController::class,'delete']);

    //service
    Route::get('/service/all', [servicesController::class,'index'])->name('services');
    Route::post('/service/add', [servicesController::class,'store'])->name('addService');
    
    Route::get('/service/edit/{id}', [servicesController::class,'edit']);
    Route::post('/service/update/{id}', [servicesController::class,'update']);

    Route::get('/service/delete/{id}', [servicesController::class,'delete']);

});