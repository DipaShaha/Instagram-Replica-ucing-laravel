<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User;
class ProfilesController extends Controller
{
    
     public function index( User $user)
    {

    	// $user=User::findOrFail($user);
    	// dd($user);
        // return view('profiles.index',[
        // 	'user'=>$user
        // ]);
        return view('profiles.index',compact('user'));
    }

     public function edit(User $user)
    { 
        $this->authorize('update',$user->profile);
    	return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    { 
        $this->authorize('update',$user->profile);
    	$data=request()->validate([
    		'title'=>'required',
    		'description'=>'required',
    		'url'=>'url | required',

    	]);

        if(request('image')){
            $image_path= request('image')->store('profiles','public');
            $image= Image::make(public_path("storage/{$image_path}"))->fit(1000,1000);
            $image->save();

        }
        // dd(array_merge(
        //     $data,
        //     ['image'=>$image_path]
        // ));
        auth()->user()->profile->update(array_merge(
            $data,
            ['image'=>$image_path]
        ));
    	return redirect("/profile/{$user->id}");  
    	
    }

}
