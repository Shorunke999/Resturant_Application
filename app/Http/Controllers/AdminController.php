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

    public function update_view($id){
        $data = Food::find($id);
        return view('admin.updateview',compact("data"));
    }
    public function update($id,Request $request){
         //data to be edited
         $data = Food::where('id',$id)->first();
         $prev_image = $data->image;
        if($request->new_image){
           //imagefile
            $image = $request->file('image');
            $imagename = time().'.'.'_'.$image->getClientOriginalName();
            $imagepath = public_path('Foodmenuimages/'.$imagename);
            Storage::disk('public')->put('Foodmenuimages/'.$imagename,File::get($image));
            Storage::delete($prev_image);
        }

        $data->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' =>$request->description,
            'image' => isset($imagepath) ? str_replace("\\", '/', $imagepath) : $prev_image
        ]);

    }

    public function delete_menu($id){
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function upload(Request $request){
        $image = $request->file('image');
        $imagename = time().'.'.'_'.$image->getClientOriginalName();
        $imagepath = public_path('Foodmenuimages/'.$imagename);
        Storage::disk('public')->put('Foodmenuimages/'.$imagename,File::get($image));
       Food::create([
            'title'=>$request->title,
            'description' => $request->description,
            'price' =>$request->price,
            'image' => str_replace("\\", '/', $imagepath)
        ]);
        return redirect()->back();
    }
}
