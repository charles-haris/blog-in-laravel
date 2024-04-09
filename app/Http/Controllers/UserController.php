<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Users.login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Users.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "First_name"=>"required",
            "Last_name"=>"required",
            "email"=>"required | email",
            "password"=>"required | min: 4 ",
        ]);
        $data=$request->all();
        $data['password']=Hash::make($request->password);
        User::create($data);
        return redirect("/login")->with("success","Your account has been created successfully!");
    }

    public function Handlelogin(Request $request){

        $verif=$request->validate([
            
            "email"=>"required | email",
            "password"=>"required",
        ]);

        if(Auth::attempt($verif)){
            $request->session()->regenerate();
            return redirect()->intended('/post')->with("success","You are connected!");
        }
        else
        {
            return redirect()->back()->with("error","Email or Password invalid!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::find(Auth::id());
        return view("Users.profile")->with("user",$user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            "First_name"=>"required",
            "Last_name"=>"required",
            "email"=>"required | email",
        ]);
        $user = User::find(Auth::id());
        $data = $request->all();
        if( key_exists("photo",$data) ){
            $fileName=time().$request->file('photo')->getClientOriginalName();
            $path=$request->file("photo")->storeAs("profiles",$fileName,"public");
            $data["photo"]= "/storage/".$path;
        }
        $user->update($data);
        return redirect("/profile")->with("success","Profile updated successfully!");
        
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login')->with("success","you are deconnected!");
    }
    

   
    
}
