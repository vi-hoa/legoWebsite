<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Passwords\PasswordBroker;

class AuthController extends Controller
{
    //show login page
    public function showLogin(){
        return view('pages.login');
    }
    //show register page
    public function showRegister(){
        return view('pages.register');
    }
    //register user
    public function postRegister(Request $request){
        //validation
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        //registeration
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ]);
        //login
        Auth::login($user);
        return back()->with('success','Successfully Logged in');
    }
    //login user
    // login user
public function postLogin(Request $request){
    // validate
    $details = $request->validate([
        'email'=>'required|email',
        'password'=>'required'
    ]);
    // login
    if(Auth::attempt($details)){
        return redirect('/'); // Redirect to the homepage
    }
    return back()->withErrors([
        'email' => 'Invalid Login Details'
    ]);


        //return
    }
    // logout
public function logout(){
    Auth::logout();
    return redirect('/'); // Redirect to the homepage
}

    //reset password
    // Send reset password link
// Send reset password link
public function sendResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $response = $this->broker()->sendResetLink(
        $request->only('email')
    );

    if ($response == Password::RESET_LINK_SENT) {
        return view('pages.reset_password_link_sent');
    } else {
        return back()->withErrors(['email' => __($response)]);
    }
}

protected function broker(): PasswordBroker
{
    return Password::broker();
}
public function showResetPasswordForm()
    {
        return view('pages.reset_password');
    }

}
