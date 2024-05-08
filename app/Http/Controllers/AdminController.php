<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
    public function upload(Request $request){
        $request->validate([
          'image' =>'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        $image = $request->image;
        $imagepath = 'foodmenu/images/'.$image;
       Storage::disk('public')->put($imagepath,$image);
       Food::create([
            'title'=>$request->title,
            'description' => $request->description,
            'price' =>$request->price,
            'image' => $imagepath
        ]);
        return redirect()->back();
    }
}
