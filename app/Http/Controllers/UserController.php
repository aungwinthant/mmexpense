<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show',compact('user'));

    }

    public function update(Request $request){
        $this->validate($request,[
            'avatar' => 'required',
        ]);

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');

            $user = auth()->user();

            $filename = time() . "_" . $user->name . "." . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
            
            $user->avatar = $filename;

            $user->save();

            return back();
        }
    }
    //
}
