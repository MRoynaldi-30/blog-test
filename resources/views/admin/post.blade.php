<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post-Admin</title>
</head>
<body>
    <h1>Selamat Datang Admin</h1>

    <form action="{{ route('admin.post.create') }}" method="post">
        @csrf
        <input type="text" name="title" id="title" placeholder="Title">
        <input type="text" name="content" id="content" placeholder="Content">
        <input type="date" name="date" id="date" placeholder="Date">
        <select name="username" id="username">
            @foreach ($accounts as $user)
                <option value="{{ $user->username }}">{{ $user->username }}</option>
            @endforeach
        </select>
        <button type="submit">Tambah Post</button>
    </form>

    <table>
        <tr></tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->idpost }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->date }}</td>
                <td>{{ $post->username }}</td>
                <td>
                    <a href="{{ route('admin.post.edit', $post->idpost) }}">Edit</a>
                    {{-- <a href="{{ route('admin.post.delete', $post->idpost) }}">Delete</a> --}}
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>