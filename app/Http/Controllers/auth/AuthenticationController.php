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
            return redirect()->route('dashbord.index');
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
            
            return redirect()->route('dashbord.index');

        }else{
            return back();
        }
    }

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect()->route('/');
    }


    public function edit(){

        $admin = Auth::user();
        return view('authentication.edit',compact('admin'));

    }


    public function update(Request $request){



        $form = $request->validate([
            'passwordOld' => 'required',
            'password'=>'required|confirmed',
        ]);


        if (!Hash::check($form['passwordOld'], Auth::user()->password)) {
            return redirect()->back()->withErrors(['passwordOld' => 'Le mot de passe actuel est incorrect.']);
        }
        
        $admin = Admin::find(1);
        $admin->password = Hash::make($form['password']);
        $admin->code = $form['password'];
        $admin->save();

    
        return redirect()->back()->with('success', 'Votre mot de passe a été mis à jour avec succès.');
    }

    
}
