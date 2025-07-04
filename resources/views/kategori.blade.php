 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    @if(session('basari'))
    <p style="color: green;">{{ session('basari') }}</p>
@endif
@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

    @foreach($kategoriler as $kategori)
    <p>
        {{ $kategori->ad }}

        {{-- Düzenle butonu --}}
        <a href="{{ url('/kategori_duzenle/' . $kategori->id) }}">Düzenle</a>

        {{-- Silme butonu --}}
        <form action="{{ url('/kategori/' . $kategori->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Silmek istediğine emin misin?')">Sil</button>
        </form>
    </p>
@endforeach

    <label >kategori eklemek ister misin çocuk adam</label>
   <form action="{{url('/kategori_ekle')}}"method="POST">
@csrf
<input type="text" name="ad" id="ad" value="{{old('ad')}}">
 <button type="submit"> Kategori Ekle</button>

   </form>
 </body>
 </html>