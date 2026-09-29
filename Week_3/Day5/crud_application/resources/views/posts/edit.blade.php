<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>

    <h1>Edit Post</h1>

    <a href="{{ route('posts.index') }}">Back to Posts</a>

    <br><br>

    <form
        action="{{ route('posts.update', $post) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <label>Title</label>
        <br>

        <input
            type="text"
            name="title"
            value="{{ old('title', $post->title) }}"
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
        >{{ old('body', $post->body) }}</textarea>

        @error('body')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">
            Update Post
        </button>

    </form>

</body>
</html>