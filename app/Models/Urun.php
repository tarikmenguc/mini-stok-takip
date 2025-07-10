<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    protected $fillable =["ad","StokMiktari","fiyat","kategori_id","user_id"];

 public function kategori(){
    return $this->belongsTo(Kategori::class);
 }
}
