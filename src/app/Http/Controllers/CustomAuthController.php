<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
    public function registration()
    {
        return view('auth.registration');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('email','=', $request->email)->first();

        if(!$user){
            return back()->with('fail','Your email not found');
        }else{
            //check password
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('LoggedUser', $user->id);
                return redirect('home');

            }else{
                return back()->with('fail','Your Password is incorrect');
            }
        }

    }
    

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();

        if($result){
            return back()->with('success','You have Registered Successfuly');
        }else{
            return back()->with('fail','Something wrong');
        }
     
    }

    public function signOut() {
        if(Session::has('LoggedUser')){
            Session::pull('LoggedUser');
            return redirect('/');
        }
    }

    public function dashboard()
    {
        $data = array();
        if(Session::has('LoggedUser')){
            $data = User::where('id','=', Session::get('LoggedUser'))->first();
            $userdata = compact('data');
            send('layouts.header', $userdata );
        }
        return view('welcome')->with($userdata);
    }

      
}
