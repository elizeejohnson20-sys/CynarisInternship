@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <h1>Welcome to Laravel</h1>

    <p>Hello, {{ $name }}!</p>

    <p>Course: {{ $course }}</p>

    <p>This data was passed from HomeController using compact().</p>

@endsection