<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }
    //reristration
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:12|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'You have registered Success!');
        } else {
            return back()->with('fail', 'Something are Wrong!');
        }
    }
    //login
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:12|min:8',
        ]);

        $user =  User::where('email', '=', $request->email)->first();
        if ($user) {
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'This Password is not matches');
            }
        } else {
            return back()->with('fail', 'This Email is not registered');
        }
    }

    //dashboard
    public function dashboard(Request $request){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'))->with('success','Login Success');
    }
    //logout
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login')->with('success','Logout Success!');
        }
    }
}
