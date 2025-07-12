<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{

    public function store(Request $request){
      $request->validate([
        "ad"=>"required"
      ]);
      Kategori::create($request->only("ad"));
      return response()->json(["message"=>"basarılı bir sekilde kategori eklendi"]);

    }
    public function update(Request $request,$id){
    $request->validate(["ad"=>"required"]);
      Kategori::findOrFail($id)->update($request->only("ad"));
return response()->json(["message"=>"basarılı bir sekilde guncellendi"]);
    }
    public function destroy(Request $request,$id){
    
        Kategori::findOrFail($id)->delete();
return response()->json(["message"=>"basarılı bir sekilde silinid"]);
    }
}
