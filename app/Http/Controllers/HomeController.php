<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function redirect(){
        $usertype = auth()->user()->usertype;
        if($usertype == 1){
            return view('adminhome');
        }else{
            return view('home');
        }
    }
    public function testadminPage(){
        return view('admin.adminhome');
    }
}
