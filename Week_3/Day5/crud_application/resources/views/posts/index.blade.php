<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
</head>
<body>

    <h1>Blog Posts</h1>

    <a href="{{ route('posts.create') }}">Create New Post</a>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if($posts->count())
        @foreach($posts as $post)

            <article style="margin: 20px 0;">
                <h2>{{ $post->title }}</h2>

                <p>
                    {{ Str::limit($post->body, 150) }}
                </p>

                <a href="{{ route('posts.show', $post) }}">View</a>
                |
                <a href="{{ route('posts.edit', $post) }}">Edit</a>

                <form
                    action="{{ route('posts.destroy', $post) }}"
                    method="POST"
                    style="display: inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>
                </form>
            </article>

        @endforeach

        {{ $posts->links() }}

    @else
        <p>No posts found.</p>
    @endif

</body>
</html>