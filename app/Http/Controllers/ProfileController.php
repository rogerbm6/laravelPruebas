<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil = Profile::find(1);
        $user = $perfil->user;
        dd($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfil = new Profile;
        $perfil->bio = 'Esta es la biografía de un usuario';
        $perfil->company = 'EscuelaIT';
        $perfil->technologies = 'PHP, Javascript, Apache, HTML';
        $user = User::find(6);
        $user->profile()->save($perfil);
        dd($perfil);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $usuario = User::find(3);
        $perfil = $usuario->profile;
        if ($perfil) {
            echo 'tengo perfil ' . json_encode($perfil);
        } else {
            return 'no tiene profile';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function borrar()
    {
        $id = 2;
        $usuario = User::find($id);
        $usuario->delete();
        dd($usuario);
    }
}
