<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class admin extends Controller
{
    public function postLogin(Request $req){
        $adminValidate=$req->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if($adminValidate){
            $email=$req->email;
            $pass=$req->password;
            $admin=User::where(['email'=>$email])->get();
            if(!empty($admin)){
                if(Hash::check($pass,$admin[0]->password))
                {
                    $req->session()->put('admin',$admin);
                    if(!empty($req->cbox))
                    {
                        setcookie("ecook",$email,time()+3600*24);
                        setcookie("pcook",$pass,time()+3600*24);
                    }
                    return redirect('chart');
                }
                else{
                    return back()->with('error',"Incorrect Password");
                }
            }
            else {
                return back()->with('error',"Email does not exist");
            }
        }
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function master(){
        return view('master');
    }
    public function logout(){
        session()->forget('admin');
        // setcookie("ecook","");
        // setcookie("pcook","");
        return redirect("/");
    }

}
