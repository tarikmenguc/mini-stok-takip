<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Urun;
use Illuminate\Http\Request;
use Berkayk\OneSignal\OneSignalFacade as OneSignal;

class ProductApiController extends Controller
{
    public function index(Request $request){ //index için
        $kullaniciId=$request->user()->id;
        $search = $request->query("search");

        $urunler=Urun::where("user_id",$kullaniciId)
        ->when($search,function($query,$search){
              $query->where("ad","like","%".$search."%");
        })->with("kategori")->paginate(15);
        return response()->json($urunler);
    }
   public function show($id) {
    $urun = Urun::with('kategori')->findOrFail($id);
    return response()->json($urun);
}
    public function store(Request $request){
    $request->validate([
        'ad' => 'required',
        
        'stok' => 'required|integer',
        'fiyat' => 'required|numeric',
        'kategori_id' => 'required|exists:kategoris,id'
    ]);
  $urun= Urun::create([
    'ad' => $request->ad,
    'stok' => $request->stok,
    'fiyat' => $request->fiyat,
    'kategori_id' => $request->kategori_id,
    'user_id' => $request->user()->id, // daha güvenli

]);
 OneSignal::sendNotificationToAll(
        "Yeni ürün eklendi: " . $urun->ad,
        null,
        null,
        null,
        null,
        ['TTL' => 3600]
    );
return response()->json(["message"=>"basarili bir sekilde eklendi"]);   
}
    public function destroy($id){
      
     Urun::findOrFail($id)->delete();
    return response()->json(["message"=>"basarili bir sekilde silindi"]);
    }
    public function update(Request $request,$id){
    $urun=Urun::findOrFail($id);
       $urun->update($request->only('ad', 'stok', 'fiyat', 'kategori_id'));

       return response()->json(["message"=>"basarili bir sekilde guncellendi"]);

    }
}
