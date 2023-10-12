<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile(Request $request){

        return view('pages.profile',['user' => $request->user()]);
    }

    public function updateImage(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->user()->image){
            File::delete(public_path('images/'.$request->user()->image));
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        User::where('id',auth()->user()->id)->update([
            'image' => $imageName
        ]);

        return redirect(route('edit.profile'))->with('message','Successfully Updated Image');
    }
}
