<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{

    public function index()
    {
//return "<h1>Welcome</h1> <p> This is homepage. </p><p><a href='/about'>About us</a></p>";
        $animals = ['lion', 'tiger', 'dog'];
        return view('homepage',
            [
                 "name" => "Jeevan",
                'animals' => $animals
            ]);

    }

    public function about()
    {
        return "<h1>Welcome</h1> <p> This is about us page. </p><p><a href='/'>Back to home</a></p>";
    }

}
