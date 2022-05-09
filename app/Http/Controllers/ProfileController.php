<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function updatepassword(Request $request){
        $datavalidate = $request->validate([
            'current_password'=> 'required',
            'password'=> 'required|confirmed'
        ]);
        $hashedpassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedpassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('message', 'password change successfuly');
        } else {
            return redirect()->back()->with('message', 'Current password is invalid');
        }
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'image'=>'mimes:png,jpg,jpeg'
        ]);
        $user = User::find(auth()->user()->id);
        $image = $user->avatar;
        if($request->hasFile('image')){
            $image = $request->file('image')->store('public/avatar');
        }
        $user->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'avatar'=>$image
        ]);
        return redirect()->back()->with('message','profile updated');
    }
}
