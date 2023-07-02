<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('id', 'desc')
            ->get();
        return Inertia::render('Usuarios/Index', [
            'usuarios' => $usuarios
        ]);
    }

    public function activar(Request $request)
    {
        User::where('id', $request->id)
            ->update([
                'estado' => 'ACTIVO',
            ]);

        return Redirect::route('usuario.index');
    }

    public function desactivar(Request $request)
    {
        User::where('id', $request->id)
            ->update([
                'estado' => 'INACTIVO',
            ]);

        return Redirect::route('usuario.index');
    }
}
