<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <form action="{{ route('admin.account.update', $accounts->username) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" placeholder="Name" value="{{ $accounts->name }}" required>
        <input type="text" name="username" placeholder="Username" value="{{ $accounts->username }}" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <select name="role" id="role" required>
            <option value="admin">Admin</option>
            <option value="author">Author</option>
        </select>
        <button type="submit">Update</button>
    </form>
</body>
</html>