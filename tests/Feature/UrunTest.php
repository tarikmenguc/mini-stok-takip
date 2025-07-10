<?php

namespace Tests\Feature;
use App\Models\User;
use App\Models\Urun;
use App\Models\Kategori;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrunTest extends TestCase
{
  use RefreshDatabase;

    public function test_kullanici_urun_ekleyebilir()
    {
        // 1. Bir kullanıcı ve kategori oluştur
        $user = User::factory()->create();
        $kategori = Kategori::create(['ad' => 'Test Kategorisi']);

        // 2. Kullanıcı ile giriş yap
        $this->actingAs($user);

        // 3. Ürün ekleme isteği gönder
        $response = $this->post('/ekle', [
            'ad' => 'Test Ürünü',
            'stok' => 5,
            'fiyat' => 99.99,
            'kategori_id' => $kategori->id,
        ]);

        // 4. Veritabanında ürün kaydının var olup olmadığını kontrol et
        $this->assertDatabaseHas('uruns', [
            'ad' => 'Test Ürünü',
            'stok' => 5,
            'fiyat' => 99.99,
            'kategori_id' => $kategori->id,
            'user_id' => $user->id,
        ]);

        // 5. Kullanıcı doğru şekilde yönlendirildi mi kontrol et
        $response->assertRedirect('/index');
    }
}
