<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\LoginModel;


class AuthController extends Controller
{   
        // Login
    public function Login(){
        return view('login_auth.login');
    }

    public function PostLogin(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $credentials = $request->only('name','email','password');
        
        if (Auth::attempt($credentials)) {
            $request->session()->put('user', $credentials);
            return redirect()->intended('dashboard')->with('success','You have Successfully 
            logged In.');
            // $request->session()->regenerate();
            
        }
        return redirect('login')->with('fail','Sorry! Your provided Credentials does not match our records');
        
        // $user = User::where(['email' => $request->email])->first();
        // // echo $login_detail;
        // if ($user) {
        //     if (Hash::check($request->password, $user->password)) {
        //         $request->session()->put('user', $user);
        //         return redirect()->intended('dashboard')->with('success','You have Successfully logged In.');
        //         // return redirect('dashboard')->with('success', 'You have Successfully logged In..');
        //     }else{
        //         return redirect('login')->with('fail','password not match');
        //     }
        // }else{
        //     return redirect('login')->with('fail','Email not registered');
        // }

        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
        
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return redirect()->intended('dashboard')->withSuccess('You have Successfully logged In.');
        // }else{
        //     return redirect('login')->withSuccess('The provided credentials do not match our records.')->onlyInput('email');
        // }
    }   

            // Registration
    public function registration(){
        return view('login_auth.register');
    }
    public function PostRegistration(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4'
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect('login')->with('success','Greate, Please Login');
    }
    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

            // Dashboard
    public function Dashboard(){
        if (Auth::check()) {
            return view('auth_dashboard');
        }
        return redirect('login')->with('fail', 'Please make sure Login First now.');
    }

            // Logout
    public function Logout(){
        Session::forget('user');
        Auth::Logout();
        return redirect('login');
    }
}
