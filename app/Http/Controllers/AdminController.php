<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    public function user(){
        $data = User::all();
        return view("admin.users",compact('data'));
    }
    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function foodmenu(){
        return view('admin.foodmenu');
    }

}
