<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function register(Request $request)
    {
        $validatedData = $request->validate(
            [
                'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:6', 'confirmed']
            ]
        );
        $user = User::create($validatedData);
        auth()->login($user);
        //   print_r($request );
        return redirect()->route('login')->with('loginmessage','Your account has been registered')->with('alert-class','alert-success');
    }

    public function login(Request $request)
    {
        $validateData = $request->validate(
            [
                "loginusername" => 'required',
                "loginpassword" => 'required'
            ]
        );

        if (auth()->attempt(
            [
                'username' => $validateData['loginusername'],
                'password' => $validateData['loginpassword']
            ])) {
            $request->session()->regenerate();
            return  redirect()->route('login')->with('message','You have successfully login.')->with('alert-class','alert-success');


        } else {
     //       Session::flash('loginmessage', 'Username and password did not match.');
      //      Session::flash('alert-class', 'alert-danger');
            return  redirect()->route('login')->with('alert-class','alert-danger')->with('message','Username and password did not match.');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Session::flash('message', 'You have been successfully logout.');
        Session::flash('alert-class', 'alert-info');
        return  redirect("/")  ;
    }

    public function profile(User $user)
    {
        return view('profile-posts', ["username"=>$user->username]);
    }
}
