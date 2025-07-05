 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <form method="POST" action="{{ route('profil.update') }}">
    @csrf
    @method('PUT')

    <label>İsim:</label>
    <input type="text" name="name" value="{{ $user->name }}">

    <label>Email:</label>
    <input type="email" name="email" value="{{ $user->email }}">

    <label>Yeni Şifre (istersen):</label>
    <input type="password" name="password">

    <button>Güncelle</button>
</form>

 </body>
 </html>