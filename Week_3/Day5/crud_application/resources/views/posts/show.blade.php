<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<body>

    <h1>{{ $post->title }}</h1>

    <p>{{ $post->body }}</p>

    <br>

    <a href="{{ route('posts.index') }}">Back to Posts</a>
    |
    <a href="{{ route('posts.edit', $post) }}">Edit Post</a>

</body>
</html>
