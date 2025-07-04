<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Urun;
use Illuminate\Http\Request;
use App\Models\Kategori;

class CreateController extends Controller
{
    public function formugoster(){
        $kategoriler=Kategori::all();
        return view("create", compact("kategoriler"));
    }
    public function ekle(Request $request){
   $validate=$request->validate(["ad" => "required",
            "fiyat" => "required|numeric",
            "kategori_id" => "required|exists:kategoris,id"]);
            Urun::create($validate);
            return redirect("index")->with("basari","verilerl başarıyla eklendi");
    }
}
