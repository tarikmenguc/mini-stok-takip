<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class KategoriController extends Controller
{
    use AuthorizesRequests;
    public function KategoriGoster(){
        
        $kategoriler=Kategori::all();
        return view("kategori",compact("kategoriler"));
    }
public function KategoriEkle(Request $request){
 $validate = $request->validate([
   "ad"=>"required"

 ]);

Kategori::create($validate);
return redirect("index")->with("basari","kategori basarıyla eklendi");
}

public function KategoriSil($id){
 $kategori = Kategori::findOrFail($id);
 $this->authorize("delete",$kategori);
 $kategori-> delete();
 return redirect()->back()->with("basari","basarili bir sekilde silindi");
}

public function KategoriDuzenle($id){
$kategori = Kategori::findOrFail($id);

return view("kategori_duzenle",compact("kategori"));
}
public function KategoriGuncelle(Request $request, $id) {
    $validate = $request->validate([
        "ad" => "required"
    ]);

    $kategori = Kategori::findOrFail($id);
$this->authorize("delete",$kategori);
    $kategori->update($validate);

    return redirect("Kategori")->with("basari", "Kategori başarıyla güncellendi");
}
}
