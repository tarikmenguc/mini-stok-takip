<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function goster(){
return view("Login");
    }
    public function dogrula(Request $request){
    $validated=$request->validate(["name"=>"required","password" => "required"]);
User::findOrFail($validated);

    }

}
