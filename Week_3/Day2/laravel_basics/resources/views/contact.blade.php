@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <h1>Contact Us</h1>

    <form method="POST" action="{{ route('contact.submit') }}">

        @csrf

        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Submit</button>

    </form>

@endsection