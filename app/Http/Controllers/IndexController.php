<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Urun;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function anasayfaGoster(){
       $urunler =Urun::with("kategori")->get();
        return view("index",compact("urunler")); //blade dosyasına gönderiyorum compactın amacı
        //daha kolay bir şekilde veriyi sayfada göstermeey yarıyor onun alternatifi ['urunler' => $urunler] buydu
    }
    
    public function sil($id){
   $urun=Urun::findOrFail($id);//ürün var mı kontrol et
    $urun->delete();  
    return redirect()->back()->with("basari","ürün basariyla silindi"); 
}
    public function duzenle($id){
   $urun=Urun::findOrFail($id);
      return view("duzenle",compact("urun"));
    }
    public function guncelle(Request $request,$id){
       $urun=Urun::findOrFail($id);
       $urun->update($request->all());
       return redirect("index")->with("basari","ürün basarıyla güncellendi");
    }
}
