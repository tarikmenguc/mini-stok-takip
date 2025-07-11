<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Urun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexController extends Controller
{
   use AuthorizesRequests;
    public function anasayfaGoster(){
      
    $kullaniciId = Auth::id();
    $search = request('search');

    $urunler = Urun::where('user_id', $kullaniciId)
        ->when($search, function ($query, $search) {
            $query->where('ad', 'like', '%' . $search . '%');
        })
        ->with('kategori')
        ->paginate(15)
        ->appends(['search' => $search]);

    return view("index", compact("urunler")); //blade dosyasına gönderiyorum compactın amacı
        //daha kolay bir şekilde veriyi sayfada göstermeey yarıyor onun alternatifi ['urunler' => $urunler] buydu
    }
    
    public function sil($id){
   $urun=Urun::findOrFail($id);//ürün var mı kontrol et
    $this->authorize('delete', $urun);
    $urun->delete();  
    return redirect()->back()->with("basari","ürün basariyla silindi"); 
}
    public function duzenle($id){
   $urun=Urun::findOrFail($id);
   $this->authorize("update",$urun);
      return view("duzenle",compact("urun"));
    }
    public function guncelle(Request $request,$id){
       $urun=Urun::findOrFail($id);
       $urun->update($request->all());
       return redirect("index")->with("basari","ürün basarıyla güncellendi");
    }
}
