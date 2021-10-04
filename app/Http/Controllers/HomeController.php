<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;

class HomeController extends Controller
{
    public function index(){

        $units = Unit::all();

        if(Auth::guest()){
            return view('dashboard', compact('units'));
        }
        else {
            return view('dashboard', compact(
                'units'));

            $role = Auth::user()->role;
            if($role=='admin'){
                return view('admin');
            }
            else {
                return view('dashboard', compact(
                    'units'));
            }
        }
    }

    public function show($id){
        $units = Unit::find($id);
        return view('pages.show',[
            "units"=>$units
        ]);
    }
}
