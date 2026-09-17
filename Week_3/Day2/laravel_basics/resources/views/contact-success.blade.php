@extends('layouts.app')

@section('title', 'Contact Submitted')

@section('content')

    <h1>Thank You!</h1>

    <p>Your contact form was submitted successfully.</p>

    <p>Name: {{ $name }}</p>

    <p>Email: {{ $email }}</p>

    <a href="{{ route('contact') }}">Go back to Contact</a>

@endsection