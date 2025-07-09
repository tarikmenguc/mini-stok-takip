<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 40px;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="{{ route('kayit') }}" method="POST">
        @csrf
        <h1>Kayıt Formu</h1>

        <input type="text" name="name" value="{{ old('name') }}" placeholder="Adınız">
        <input type="text" name="email" value="{{ old('email') }}" placeholder="E-posta">
        <input type="password" name="password" placeholder="Şifre">

        <button type="submit">Kayıt Ol</button>
    </form>
</body>
</html>
