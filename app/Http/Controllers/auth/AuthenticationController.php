<?php

namespace App\Http\Controllers\auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function showLogin(){
        if(Auth::user()){
            return redirect()->route('vente.index');
        }else{
            return view('authentication.login');
        }
    }

    public function loginOrSignUp(Request $request)
    {
        if ($request->req == 'signUp' ) {
            return $this->store($request);
        } else {
            return $this->login($request);
        }
        // dd($request->req );
    }


    public function store(Request $request){
        // dd($request->all());
        $form = $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $form['password']=Hash::make($request->password) ;

        Admin::create($form);

        return redirect()->route('/');
    }

    public function Login(Request $request){
        $request->validate([
            'userName'=>'required',
            'password'=>'required'
        ]);

        $form = $request->only('userName' , 'password');
        
        if(Auth::attempt($form)){
            $request->session()->regenerate() ;
            return redirect()->route('vente.index');
        }else{
            return back();
        }
    }

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect()->route('/');
    }

}
