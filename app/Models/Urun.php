<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
   use HasFactory;
    protected $fillable =["ad","fiyat","kategori_id","user_id","stok"];

 public function kategori(){
    return $this->belongsTo(Kategori::class);
 }
}
