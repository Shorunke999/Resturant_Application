<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function user(){
        $data = User::all();
        return view("admin.users",compact("data"));
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
            $imagename = $image->getClientOriginalName();
            $image->storeAs('public/images/',$imagename);
            $imagepath = $imagename;
            Storage::disk('public')->delete('images/'.$prev_image);
        }

        $data->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' =>$request->description,
            'image' => isset($imagepath) ? $imagepath : $prev_image
        ]);
        return redirect()->route('foodmenu');
    }

    public function delete_menu($id){
        $data = Food::find($id);
        $imagepath = $data->image;
        $data->delete();
        Storage::disk('public')->delete('images/'.$imagepath);
        return redirect()->back();
    }

    public function upload(Request $request){
        $image = $request->file('image');
        $imagename = $image->getClientOriginalName();
        $image->storeAs('public/images/',$imagename);
        $imagepath = $imagename;
       Food::create([
            'title'=>$request->title,
            'description' => $request->description,
            'price' =>$request->price,
            'image' => $imagepath
        ]);
        return redirect()->back();
    }

    public function reservation(Request $request){
        Reservation::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'guest' =>$request->guest,
            'message' => $request->message,
            'date' =>$request->date,
            'time' =>$request->time
        ]);
        return redirect()->route('home');
    }
    public function viewreservation(){
        $data = Reservation::all();
        return view('admin.adminreservation',compact('data'));
    }
    public function viewchef(){
        $data = Foodchef::all();
        return view('admin.adminchef',compact('data'));
    }
    public function uploadchef(Request $request){
        $chef_image = $request->file('image');
        $chef_image_name = $chef_image ->getClientOriginalName();
        $chef_image->storeAs('public/images/chefimages',$chef_image_name);

        Foodchef::create([
            'image' => 'storage/images/chefimages/'.$chef_image_name,
            'name' => $request->name,
            'speciality' => $request->speciality
        ]);
        return redirect()->back();
    }
    public function updatechef($id){
        $data = Foodchef::find($id);
        return view('admin.updatechef',compact('data'));
    }
    public function updatechefdata($id,Request $request){
          //data to be edited
          $data = Foodchef::where('id',$id)->first();
          $prev_image = $data->image;
         if($request->new_image){
            //imagefile
             $chef_image = $request->file('new_image');
             $chef_image_name = $chef_image->getClientOriginalName();
             $chef_image->storeAs('public/images/chefimages',$chef_image_name);
             $chef_image_path = 'storage/images/chefimages/'.$chef_image_name;
             Storage::disk('public')->delete('images/chefimages/'.$prev_image);
         }

         $data->update([
             'name' => $request->name,
             'speciality' => $request->speciality,
             'description' =>$request->description,
             'image' => isset($chef_image_path) ? $chef_image_path : $prev_image
         ]);
         return redirect()->route('viewchef');

    }
    public function deletechef($id){
        Foodchef::find($id)
        ->delete();
        return redirect()->back();
    }
}
