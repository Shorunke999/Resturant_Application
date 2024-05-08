<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = Food::all();
        return view('home',compact("data"));
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
