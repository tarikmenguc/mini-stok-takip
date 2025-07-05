<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable=["ad"];

    public function urunler(){
      return  $this->hasMany(Urun::class);
    }
}
