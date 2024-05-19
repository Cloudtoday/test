<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    // public function display()
    // {
    //     return "<h1>Hello,DemoController</h>";
    // }

public function form():View
{
    return view("form"); //form.blade.php
}
public function data_submit(Request $request)
{
    // dd($request->all());
    $request->validate(
        [
            'name'        =>"required",
            'age'         =>"required|integer|between:18,40",
            'email'       =>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/",
            'password'    =>"required|between:4,16",
            'phone'       =>"required|regex:/^[0-9]{10}$/",
            'image'       =>"required",

        ]
        );
    $name= $request->input("name");
    $age= $request->input("age");
    $email= $request->input("email");
    $password= $request->input("password");
    $phone= $request->input("phone");
    if($request->file("image"))
    $file= $request->file("image");
    $fileName= time()."_".$file->getClientOriginalName();
    $uploadLocation= "./upload";
    $file->move($uploadLocation,$fileName);
    $data=[
            'name'=>$name,
            'age'=>$age,
            'email'=>$email,
            'password'=>$password,
            'phone'=>$phone,
            'image'=>$uploadLocation."/".$fileName
         ];
    DB::table('laravel_demo')->insert($data);     
// return view('form')->with(['userInfo'=>$data]);   
return redirect("/signin");
}
public function all_data():View
{
    $allUser=DB::table('laravel_demo')->get();
    return view("all")->with(['allInfo'=>$allUser]);  //all.blade.php
}
public function data_delete($del)
{
    $delId= $del;
    $user= DB::table('laravel_demo')->where("user_id","=",$delId)->delete();
    return redirect('/alldata');
}
public function data_edit($ep):View
{
    $editId=$ep;
    $user=DB::table('laravel_demo')->where("user_id","=",$editId)->get();
    // dd($user);
    return view("edit")->with(['editInfo'=>$user[0]]);
}
public function data_update(Request $request)
    {
        $userid= $request->input("hid");
        $name= $request->input("name");
        $age= $request->input('age');
        $email= $request->input('email');
        $phone= $request->input('phone');
        if($request->file("image"))
        $file= $request->file("image");
        $fileName= time()."_".$file->getClientOriginalName();
        $uploadLocation= "./upload";
        $file->move( $uploadLocation,$fileName);
        $data= [
                    'name'=>$name,
                    'age'=>$age,
                    'email'=>$email,
                    'phone'=>$phone,
                    'image'=>$uploadLocation."/".$fileName
               ];
        DB::table('laravel_demo')->where("user_id","=",$userid)->update($data);
        //return view('form')->with(['userInfo'=>$data]);
        return redirect('/alldata');
    }
    public function signin():View
    {
        return view('login');   //login.blade.php
    }
    public function login_data(Request $request)
    {
        $username= $request->input('uname');
        $password= $request->input('password');
        $data= DB::table('laravel_demo')->where("email","=",$username)->orWhere("phone","=",$username)->get();
        if(empty($data[0]))
        {
            return redirect('/signin')->with('message','user not found');
        }
        else
        {
            $password_db= $data[0]->password;
            if($password_db== $password)
            {
                return redirect('/alldata');
            }
            else
            {
                return redirect('/signin')->with('message','password does not matched');
            }
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/signin');
    }
}