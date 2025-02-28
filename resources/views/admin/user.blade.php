<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-user</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full max-w-2xl bg-gray-100 h-screen flex items-center flex-col mx-auto my-10">
        <div class="p-4 w-full">
            <form action="{{ route('admin.account.create') }}" method="post">
                @csrf
                <h1 class="mb-3">Tambah User</h1>
                <input type="text" name="name" placeholder="Name" required class="block w-full p-2 border border-gray-300 rounded-md mb-2">
                <input type="text" name="username" placeholder="Username" required class="block w-full p-2 border border-gray-300 rounded-md mb-2">
                <input type="password" name="password" placeholder="Password" required class="block w-full p-2 border border-gray-300 rounded-md mb-2">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="block w-full p-2 border border-gray-300 rounded-md mb-2">
                <select name="role" id="role" required class="block w-full p-2 border border-gray-300 rounded-md mb-2">
                    <option value="admin">Admin</option>
                    <option value="author">Author</option>
                </select>
                <div class="bg-blue-200 p-2 w-fit rounded-2xl hover:bg-blue-400">
                    <button type="submit">Tambah User</button>
                </div>
                {{-- <button type="submit">Create</button> --}}
            </form>
        </div>
    
        <table class="w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $user)
                    <tr>
                        <td class="p-2">{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('admin.account.edit', $user->username) }}" class="bg-blue-200 p-2 w-fit rounded-2xl hover:bg-blue-400">Edit</a>
                            <a href="{{ route('admin.account.delete', $user->username) }}" class="bg-red-200 p-2 w-fit rounded-2xl hover:bg-red-400">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>