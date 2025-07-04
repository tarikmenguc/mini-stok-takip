<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Türkçe karakterler için charset ayarı -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mobil uyumluluk -->
    <title>Ana Sayfa</title>
</head>
<body>
    <h1>Ana sayfaya hoş geldin</h1><br><br>
    <h2>Bu sayfada düzenleme, silme ve ürün görüntüleme yapabilirsin</h2>

    {{-- Başarı mesajı varsa göster --}}
    @if(session("basari"))
        <p style="color: green;">{{ session("basari") }}</p>
    @endif

    {{-- Hatalar varsa (örneğin validation) onları listele --}}
    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $hata)
                <li>{{ $hata }}</li>
            @endforeach
        </ul>
    @endif

    {{-- Ürünleri tek tek gösteriyoruz --}}
    @foreach($urunler as $urun)
        <div style="border: 1px solid black; padding: 10px; margin-bottom: 10px;">
            <p><strong>Ad:</strong> {{ $urun->ad }}</p>
            <p><strong>Fiyat:</strong> {{ $urun->fiyat }} ₺</p>
            <p><strong>Açıklama:</strong> {{ $urun->aciklama }}</p>
            <p><strong>Kategori ID:</strong> {{ $urun->kategori_id }}</p>

            {{-- DÜZENLEME FORMU (GET ile yönlendiriyoruz) --}}
            <form action="{{ url('/duzenle/' . $urun->id) }}" method="get" style="display: inline-block;">
                @csrf
                <button type="submit">Düzenle</button>
            </form>

            {{-- SİLME FORMU (POST yöntemi, method spoofing ile DELETE) --}}
            <form action="{{ url('/sil/' . $urun->id) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE') {{-- Laravel’de DELETE işlemi için --}}
                <button type="submit" onclick="return confirm('Silmek istediğine emin misin?')">Sil</button>
            </form>
        </div>
    @endforeach

    {{-- Yeni ürün ekleme sayfasına gitmek için bir link --}}
    <a href="{{ url('/ekle') }}">Yeni Ürün Ekle</a>
</body>
</html>
