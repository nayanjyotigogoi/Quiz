<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
       
        return view('register.view');

    }

    public function login()
    {
       
        return view('login.login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'email'=>'required|unique:registration',
            'name'=>'required',
            'password'=>'required',
           
        ]);
            $datas = new Registration;
            $datas->email = $request->email;
            $datas->name = $request->name;
            $datas->password = $request->password;
            $datas->save();


            return redirect('login')->with('success','Registered Successfully');
    }
}
