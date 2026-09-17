<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }

        nav {
            background: #222;
            padding: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        main {
            padding: 30px;
            max-width: 900px;
            margin: auto;
        }

        form {
            background: white;
            padding: 20px;
            max-width: 500px;
        }

        input {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            cursor: pointer;
        }

        footer {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>

<nav>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('services') }}">Services</a>
    <a href="{{ route('contact') }}">Contact</a>
</nav>

<main>
    @yield('content')
</main>

@include('partials.footer')

</body>
</html>