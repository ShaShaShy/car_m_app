<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\CarFunction;
use App\models\Rents;

class CarController extends Controller
{
    public function Admin(){
        return view('/admin/AdminDashboard', ['carData' => CarFunction::paginate(6)], ['userRents' => Rents::all()]);
    }

    public function dashboard(){
        return view('/welcome', ['carData' => CarFunction::all()], ['userRents' => Rents::all()]);
    }

    public function saveCar(Request $request){

        $car = new CarFunction;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('uploads'), $filename);

            $car -> car_name = $request -> c_name;
            $car -> car_desc = $request -> c_desc;
            $car -> car_rent = $request -> c_rent;
            $car -> img_path = $filename;
        }
        $car->save();
        return redirect('/home');  
    }

    public function saveRent(Request $request){

        $user = new Rents;

        $user -> client_name = $request -> cli_name;
        $user -> car_name = $request -> car_name;
        $user -> rent = $request -> rent;
        $user -> rent_date = $request -> date;
        $user -> due_date = $request -> due_date;

        $user ->save();
        return redirect('/home');
    }

}
