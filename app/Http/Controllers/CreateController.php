<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Urun;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function formugoster(){
        $kategoriler=Kategori::all();
        return view("create", compact("kategoriler"));
    }
    public function ekle(Request $request){
  
    $request->validate([
        'ad' => 'required',
        
        'stok' => 'required|integer',
        'fiyat' => 'required|numeric',
        'kategori_id' => 'required|exists:kategoris,id'
    ]);

    // Ürün oluşturuluyor
    Urun::create([
        'ad' => $request->ad,
        
        'stok' => $request->stok,
        'fiyat' => $request->fiyat,
        'kategori_id' => $request->kategori_id,
        'user_id' => Auth::id(), 
    ]);

    return redirect('/index')->with('basari', 'Ürün başarıyla eklendi!');
    }
}
