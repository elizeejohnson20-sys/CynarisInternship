<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $name = 'Elizabeth';
        $course = 'BCA';

        return view('home', compact('name', 'course'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }
}