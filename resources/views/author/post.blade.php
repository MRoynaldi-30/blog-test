<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Author Post</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full max-w-2xl bg-gray-100 h-screen flex items-center flex-col mx-auto my-10">
        <div class="p-4 w-full">
            <form action="{{ route('author.post.create') }}" method="POST">
                @csrf
                <h1 class="mb-3">Tambah Post</h1>
                <input type="text" name="title" id="title" placeholder="Title" class="block w-full p-2 border border-gray-300 rounded-md mb-2">
                <input type="text" name="content" id="content" placeholder="Content" class="block w-full p-2 border border-gray-300 rounded-md mb-2">
                <input type="date" name="date" id="date" placeholder="Date" class="block w-full p-2 border border-gray-300 rounded-md mb-2">
                <select name="username" id="username" class="block w-full p-2 border border-gray-300 rounded-md mb-2">
                    @foreach ($accounts as $user)
                        <option value="{{ $user->username }}">{{ $user->username }}</option>
                    @endforeach
                </select>
                <div class="bg-blue-200 p-2 w-fit rounded-2xl hover:bg-blue-400">
                    <button type="submit">Tambah Post</button>
                </div>
            </form>
        </div>
    
        <table class="w-full">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            @foreach ($posts as $post)
                <tr class="my-2">
                    <td class="p-2">{{ $post->idpost }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->username }}</td>
                    <td>
                        <a href="{{ route('author.post.edit', $post->idpost) }}" class="bg-blue-200 p-2 w-fit rounded-2xl hover:bg-blue-400">edit</a>
                        <a href="{{ route('author.post.delete', $post->idpost) }}" class="bg-red-200 p-2 w-fit rounded-2xl hover:bg-red-400">delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>