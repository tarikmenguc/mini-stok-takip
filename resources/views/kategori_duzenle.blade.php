<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if(session("basari"))
<p style="color: green;">{{session("basari")}}</p>
@endif
@if($errors->any())
 <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="/kategori_guncelle/{{$kategori->id}}" method="post">
        @csrf
        @method('PUT')
       <input type="text" name="ad" id="ad" value="{{ $kategori->ad }}">

    </form>
</body>
</html>