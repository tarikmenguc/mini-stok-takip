<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    protected $fillable =["ad","aciklama","StokMiktari","fiyat","kategori_id"];
}
