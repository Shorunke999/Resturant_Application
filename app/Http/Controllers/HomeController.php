<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = Food::all();
        $data2 = Foodchef::all();
        return view('home',compact("data","data2"));
    }

    public function redirect(){
        $data = Food::all();
        $usertype = auth()->user()->usertype;
        if($usertype == 1){
            return view('admin.adminhome');
        }else{
            return view('home',compact('data'));
        }
    }
    public function testadminPage(){
        return view('admin.adminhome');
    }
}
