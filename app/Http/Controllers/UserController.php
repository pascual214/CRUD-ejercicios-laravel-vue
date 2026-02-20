<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $fields = User::fieldLabels();
        //
        return Inertia::render('Users/Index', ['rows' => $users, 'fields' => $fields]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function getUsuario(){
        $usuario = User::role("usuario") -> get();
        $fields = User::fieldLabels();
        return Inertia::render("usuario.index", ["rows"=>$usuario,'fields'=>$fields ]);
    }

    public function getEntrenador(){
        $entrenador = User::role("entrenador") -> get();
        $fields = User::fieldLabels();
        return Inertia::render("entrenador.index", ["rows"=>$entrenador,'fields'=>$fields ]);
    }
    //
}
