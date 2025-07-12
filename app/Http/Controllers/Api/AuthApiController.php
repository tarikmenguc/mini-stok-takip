<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthApiController extends Controller
{
    public function login(Request $request){
       
        $request->validate(["email"=>"required|email",
    "password"=>"required"]);
    $user=User::where("email",request()->email)->first();
     if(!$user || ! Hash::check($request->password,$user->password)){
return response()->json(["message","girilen bilgiler yanlış"],401);
     }
     $token=$user->createToken("api-token")->plainTextToken;
     return response()->json(["user"=>$user,"token"=>$token]);

    }
    public function me(Request $request){
        return response()->json(["user"=>$request->user()]);

    }
    public function logout(Request $request){
$request->user()->currentAccessToken()->delete();
return response()->json(["message","çıkış başarılı"]);
    }
}
