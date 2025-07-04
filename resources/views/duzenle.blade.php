<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/guncelle/{{$urun->id}}" method="POST">
@csrf
@method("put")
 <input type="text" name="ad" value="{{$urun->ad}}"> <br><br>
  <input type="number" name="fiyat" value="{{$urun->fiyat}}"> <br><br>
   <input type="number" name="kategori_id" value="{{$urun->kategori_id}}"> <br><br>
<button type="submit">Güncelle</button>

    </form>
</body>
</html>