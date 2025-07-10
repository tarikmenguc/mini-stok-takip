<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Kategori extends Model
{
  use HasFactory;
    protected $fillable=["ad"];

    public function urunler(){
      return  $this->hasMany(Urun::class);
    }
}
