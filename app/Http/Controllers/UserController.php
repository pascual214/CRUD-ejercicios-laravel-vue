<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function getUsuario(){
        $usuario = User::role("usuario") -> get();
        return Inertia::render("Usuario.index", ['Usuario' => $usuario]);
    }

    public function getEntrenador(){
        $entrenador = User::role("entrenador") -> get();
        return Inertia::render("Entrenador.index", ['Entrenador' => $entrenador]);
    }
    //
}
