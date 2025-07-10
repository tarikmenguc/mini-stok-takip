<?php

namespace Tests\Feature;
use App\Models\User;
use App\Models\Urun;
use App\Models\Kategori;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrunGuncellemeTest extends TestCase
{
    use RefreshDatabase;

    public function test_kullanici_urun_guncelleyebilir()
    {
       
        $user = User::factory()->create();
        $kategori = Kategori::factory()->create();

        
        $urun = Urun::create([
            'ad' => 'Eski Ürün',
            'fiyat' => 100,
            'stok' => 5,
            'kategori_id' => $kategori->id,
            'user_id' => $user->id,
        ]);

        
        $this->actingAs($user)
    ->put("/guncelle/{$urun->id}", [
        'ad' => 'Yeni Ürün',
        'fiyat' => 150,
        'stok' => 10, // formdaki ad bu
        'kategori_id' => $kategori->id,
    ]);

      
       $this->assertDatabaseHas('uruns', [
    'id' => $urun->id,
    'ad' => 'Yeni Ürün',
    'fiyat' => 150,
    'stok' => 10, // Veritabanı sütunu bu
    'kategori_id' => $kategori->id,
]);

    }
}
