<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Foodchef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data = Food::all();
        $data2 = Foodchef::all();
        return view('home',compact("data","data2"));
    }

    public function redirect(){
        $data = Food::all();
        $data2 = Foodchef::all();
        $count_cart = Cart::where('user_id',Auth::user()->id)
        ->count();
        $usertype = auth()->user()->usertype;
        if($usertype == 1){
            return view('admin.adminhome');
        }else{
            return view('home',compact('data','data2','count_cart'));
        }
    }
    public function testadminPage(){
        return view('admin.adminhome');
    }
    public function addcart(Request $request,$id){
        $user_id = Auth::user()->id;
        $food_id = $id;
        $quantity = $request->quantity;
        Cart::create([
            'user_id' => $user_id,
            'food_id' => $food_id,
            'quantity' => $quantity
        ]);
        return redirect()->back();

    }
}
