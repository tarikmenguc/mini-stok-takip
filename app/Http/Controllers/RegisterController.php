<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function registergoster(){
        return view("register");
    }
  public function register(Request $request){
 $validated=$request->validate(["name"=>"required","email" => "required|email|unique:users","password"=>"required|min:6"]);
 User::create([
    "name" => $validated["name"],
    "email" => $validated["email"],
    "password" => Hash::make($validated["password"])
]);

  return redirect()->route("profil.edit")->with("basari","hesabiniz basariyla olusturulmustur");
  }
}
