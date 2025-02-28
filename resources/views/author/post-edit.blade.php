<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Author-Edit-Post</title>
</head>
<body>
    <form action="{{ route('author.post.update', $post->idpost) }}" method="post">
        @csrf
        @method('PUT')
        
        <input type="text" name="title" value="{{ $post->title }}" required>
        <textarea name="content" required>{{ $post->content }}</textarea>
        <input type="date" name="date" value="{{ $post->date }}" required>
        <select name="username" id="username">
            @foreach ($accounts as $user)
                <option value="{{ $user->username }}" {{ $user->username == $post->username ? 'selected' : '' }}>{{ $user->username }}</option>
            @endforeach
        </select>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>