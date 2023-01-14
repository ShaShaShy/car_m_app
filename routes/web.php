<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CarController;
use App\models\CarFunction;
use App\models\Rents;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){


Route::get('/AdminDashboard', [CarController::class, 'Admin'])->name('Admin');

});


Route::get('/', function () {
    if (Auth::check()){
        $user_name = Auth::user()->name;
        return view('welcome', ['carData' => CarFunction::all()] , ['userRents' => Rents::where('client_name',$user_name)->get()]);
    }else{
        return view('welcome', ['carData' => CarFunction::all()] , ['userRents' => Rents::all()]);
    }
});


Route::post('/saveInfo',[Carcontroller::class,'saveCar'])->name('saveCar');

Route::post('/saveUserInfo',[Carcontroller::class,'saveRent'])->name('saveRent');

Route::get('/dashboard', [CarController::class, 'Dashboard'])->name('dashboard');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index', 'carData' => CarFunction::paginate(6)])->name('home');
