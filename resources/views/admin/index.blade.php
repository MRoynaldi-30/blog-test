<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>Selamat Datang Admin</h1>
    <a href="{{ route('logout') }}">Logout</a>
    <a href="{{ route('admin.user') }}" class="bg-green-200">kelola user User</a>

    <a href="{{ route('admin.post') }}" class="bg-green-200">kelola post Author</a>
</body>
</html>