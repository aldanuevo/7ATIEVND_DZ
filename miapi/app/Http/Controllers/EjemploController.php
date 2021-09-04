<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjemploController extends Controller
{
    public function index(Request $request) {
        return "Hola " .$request->get("nombre");
    }
}
