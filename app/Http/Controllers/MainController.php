<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $CardOption = [
            "Usuario"=> [
                'title' => 'Usuario',
                'description' => 'Mostrar todos los usuarios',
                'img' => '/images/usuario_logo.jpg',
                'action' => '/usuario'
            ],
            "Entrenador" => [
                'title' => 'Entrenador',
                'description' => 'Mostrar todos los entrenadores',
                'img' => '/images/usuario_logo.jpg',
                'action' => '/entrenador'
            ],
            "Ejercicios" => [
                'title' => 'Ejercicios',
                'description' => 'Mostrar todos los ejercicios',
                'img' => '/images/entrenamiento-baloncesto.jpg',
                'action' => '/exercises'
            ],
            "Cronometro" => [
                'title' => 'Cronometro',
                'description' => 'Mostrar el cronometro',
                'img' => '/images/cronometro.avif',
                'action' => '/crono'
            ]
        ];

        return Inertia::render('Main', ['CardOption' => $CardOption]);
        //
    }
}
