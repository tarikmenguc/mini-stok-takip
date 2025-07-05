<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function usersayfasigoster()
    {
        return view("usersedit", [
            'user' => Auth::user() 
        ]);
    }

    public function sil()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        Auth::logout(); // Oturumu kapat
        $user->delete();
        
        return redirect("/index")->with("basari", "Hesabınız başarılı bir şekilde silindi");
    }

    public function guncelle(Request $request)
    {
        $user = Auth::user();

        $validate = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email,".$user->id,
            "password" => "nullable|min:8|confirmed" // Şifre onayı ve daha uzun minimum
        ]);

        $user->name = $validate["name"];
        $user->email = $validate["email"];

        if (!empty($validate["password"])) {
            $user->password = Hash::make($validate["password"]);
        }
/** @var \App\Models\User $user */
        $user->save();

        return redirect()->back()->with("basari", "Profil bilgileriniz başarıyla güncellendi");
    }
}