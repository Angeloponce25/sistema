<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        return view('perfil');
    }

    public function todos()
    {
        //
        $user = User::All();
        return view('usuarios.usuarios_todos',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.usuarios_editar', compact('user'));
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
        $userActualizada = User::find($id);
        $userActualizada->name = $request->nombre;
        $userActualizada->email = $request->email;
        $userActualizada->rol = $request->rol;
        $userActualizada->save();
        return back()->with('mensaje_editar', 'Usuario Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userEliminar = User::findOrFail($id);
        $userEliminar->delete();
        return back()->with('mensaje_eliminar', 'Usuario Eliminado');
    }

    public function password()
    {
        return view('password');
    }
    public function updatepassword(Request $request)
    {
        $request->validate([
            'mypassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return back()->with('exito', 'Password cambiado con éxito');
            }
            else
            {
                return back()->with('error', 'Credenciales incorrectas');
            }
    }
}
