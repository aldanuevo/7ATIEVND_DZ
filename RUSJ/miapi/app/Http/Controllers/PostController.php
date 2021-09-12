<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function contact_post(Request $request)
    {
 
        echo "nombre: ".$request->input('nombre')."<br>";
        return view('contact');
    }
}
