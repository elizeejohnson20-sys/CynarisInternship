<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>

    <h1>Create New Post</h1>

    <a href="{{ route('posts.index') }}">Back to Posts</a>

    <br><br>

    <form action="{{ route('posts.store') }}" method="POST">

        @csrf

        <label>Title</label>
        <br>

        <input
            type="text"
            name="title"
            value="{{ old('title') }}"
        >

        @error('title')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Body</label>
        <br>

        <textarea
            name="body"
            rows="8"
            cols="50"
        >{{ old('body') }}</textarea>

        @error('body')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">
            Create Post
        </button>

    </form>

</body>
</html>