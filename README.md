


# Mini Stok Takip — Laravel 12

Laravel 12 ile geliştirdiğim, **ürün–kategori odaklı stok yönetim sistemi**.  
Bu proje sayesinde Laravel ekosisteminin neredeyse tüm temel taşlarını kendi elimin altında deneyimledim.

## 🚀 Öne Çıkan Özellikler
| Alan | Uygulamada Nasıl? |
|------|-------------------|
| **CRUD** | Ürün & kategori için tam CRUD (Blade formları, Validation, Soft-delete) |
| **Eloquent İlişkileri** | `Product belongsTo Category`, `Category hasMany Product` – eager loading & query-scope |
| **Middleware** | `auth`, `verified`, özel `IsAdmin` middleware’iyle panel koruması |
| **Policy / Authorization** | `ProductPolicy` → yalnızca yetkili kullanıcı güncelle-silebiliyor |
| **REST API** | `/api/products` ve `/api/categories` (JSON response, Sanctum token) | (api eklenecek)
| **Pagination** | `ProductController@index` → `Product::with('category')->paginate(10)` |
| **File Upload** | Ürün görseli `storage/app/public/products` dizinine, URL olarak sunuluyor |
| **Blade Bileşenleri** | Tekrarlayan kart & alert yapıları `<x-product-card>` şeklinde |
| **Jetstream + Sanctum** | Hazır e-posta doğrulamalı kimlik doğrulama akışı |
| **Unit Test** | `tests/Feature/ProductTest.php` → CRUD & policy testleri |

## 🌱 Bana Kazandırdıkları
- **Eloquent ORM’i derinlemesine kavradım**: ilişki tanımları, query scope, eager loading performans farkı  
- **REST mimarisi ve API güvenliği**: Sanctum token ile mobil-hazır uç noktalar  
- **Gerçek dünya akışı**: middleware → policy → controller → service → repository zinciri  
- **Dosya yükleme ve depolama**: Storage facade’ı, symbolic link, public URL üretimi  
- **Blade komponentleri** ile tekrar eden HTML’in bakımı çok kolaylaştı  
- **Test odaklı geliştirme** (TDD’ye giriş) – her feature için kırılmayan test seti  
- **Git & GitHub akışı**: feature branch ↔ pull request ↔ code review  

## 🛠️ Teknoloji Yığını
- **Laravel 12.x**, PHP 8.2, Composer 2 :contentReference[oaicite:0]{index=0}  
- MySQL 8, Eloquent ORM  
- Jetstream + Tailwind CSS + Vite  
- PHPUnit 10, Laravel Pest  
- OneSignal (bildirim denemeleri)  

## ⚡ Hızlı Kurulum
```bash
git clone https://github.com/tarikmenguc/mini-stok-takip.git
cd mini-stok-takip
composer install
cp .env.example .env      # .env ayarlarını yap
php artisan key:generate
php artisan migrate --seed
npm install && npm run build
php artisan storage:link   # görseller için
php artisan serve          # http://127.0.0.1:8000
````

> **Demo kullanıcı**
> E-posta: `demo@demo.com` • Şifre: `password`



## 🗺️ Yol Haritası

* [ ] Çoklu resim yükleme (Spatie Media Library)
* [ ] Stok hareket geçmişi (In/Out log)
* [ ] Livewire üzerinden gerçek-zamanlı tablo filtreleme

## 🤝 Katkıda Bulun

Fork → Branch → PR akışı.  Her PR için test eklemen yeterli.

## 📜 Lisans

MIT

---


> Ek öneri veya geri bildirimlerin için issue açabilirsin. 🙌

