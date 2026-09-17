<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        return view('contact-success', compact('name', 'email'));
    }
}