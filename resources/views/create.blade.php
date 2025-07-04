 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    @if(session("basari"))
    <p style="color: green;">{{session("basari")}} </p>
    @endif
    @if($errors->any())
     <ul style="color: red;">
            @foreach($errors->all() as $hata)
                <li>{{ $hata }}</li>
            @endforeach
        </ul>
    @endif
   <form action="/ekle" method="POST">
    @csrf

    <label>Ürün Adı:</label>
    <input type="text" name="ad" value="{{ old('ad') }}"> <br><br>

    <label>Açıklama:</label>
    <input type="text" name="aciklama" value="{{ old('aciklama') }}"> <br><br>

    <label>Stok Miktarı:</label>
    <input type="number" name="StokMiktari" value="{{ old('StokMiktari') }}"> <br><br>

    <label>Fiyat:</label>
    <input type="number" name="fiyat" value="{{ old('fiyat') }}"> <br><br>

    <label>Kategori Seç:</label>
    <select name="kategori_id">
        @foreach($kategoriler as $kategori)
        <option value="{{ $kategori->id }}" @selected(old('kategori_id') == $kategori->id)>
    {{ $kategori->ad }}
</option>
        @endforeach
    </select> <br><br>

    <button type="submit">Ekle</button>
</form>



 </body>
 </html>