<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;


Route::get('/', function () {
    return view('welcome');
});

Route::get("/index", [IndexController::class, "anasayfaGoster"]);
Route::get("/duzenle/{id}", [IndexController::class, "duzenle"]);
Route::put("/guncelle/{id}", [IndexController::class, "guncelle"]);
Route::delete("/sil/{id}", [IndexController::class, "sil"]);

Route::get("/ekle", [CreateController::class, "formugoster"]);
Route::post("/ekle", [CreateController::class, "ekle"]);


Route::get("/Kategori",[KategoriController::class,"KategoriGoster"]);
Route::post("/kategori_ekle",[KategoriController::class,"KategoriEkle"]);
Route::delete("/kategori/{id}",[KategoriController::class,"KategoriSil"]);
Route::get("/kategori_duzenle/{id}",[KategoriController::class,"KategoriDuzenle"]);
Route::put("/kategori_guncelle/{id}",[KategoriController::class,"KategoriGuncelle"]);

Route::middleware('auth')->group(function () {
    Route::get('/profil', [UserController::class, 'usersayfasigoster'])->name('profil.edit');
    Route::put('/profil', [UserController::class, 'guncelle'])->name('profil.update');
    Route::delete('/profil', [UserController::class, 'sil'])->name('profil.destroy');
});

Route::get("/registergoster",[RegisterController::class,"registergoster"])->name("goster");
Route::post("/register",[RegisterController::class,"register"])->name("kayit");
Route::get('/login', function () {
    return 'Giriş sayfası yapılmadı :)';
})->name('login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
