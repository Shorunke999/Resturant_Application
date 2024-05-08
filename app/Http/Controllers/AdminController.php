<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
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
    public function  logout(){
        $admin = auth()->user();
        $admin->logout;
        return redirect()->route('home');
    }

    public function foodmenu(){
        $data = Food::all();
        return view('admin.foodmenu',compact('data'));
    }
    public function delete_menu($id){
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function upload(Request $request){
        $image = $request->file('image');
        $imagename = time().'.'.'_'.$image->getClientOriginalName();
        Storage::disk('public')->put('/foodmenu/images/'.$imagename,File::get($image));
       Food::create([
            'title'=>$request->title,
            'description' => $request->description,
            'price' =>$request->price,
            'image' => $imagename
        ]);
        return redirect()->back();
    }
}
