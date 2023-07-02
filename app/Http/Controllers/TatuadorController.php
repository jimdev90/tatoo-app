<?php

namespace App\Http\Controllers;

use App\Models\Tatuador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class TatuadorController extends Controller
{
    public function index()
    {
        return Inertia::render('Tatuador/Index', [
            'tatuadores' => Tatuador::get(),
            'status' => session('status'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => ['required'],
            'dni' => ['required'],
        ]);

        Tatuador::create([
            'nombres' => $request->nombres,
            'dni' => $request->dni
        ]);

        return Redirect::route('tatuador.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombres' => ['required'],
            'dni' => ['required'],
        ]);

        Tatuador::where('id', $request->id)
            ->update([
                'nombres' => $request->nombres,
                'dni' => $request->dni
            ]);

        return Redirect::route('tatuador.index');
    }

    public function delete(Request $request)
    {
        Tatuador::where('id', $request->id)
            ->update([
                'estado' => 'INACTIVO',
            ]);

        return Redirect::route('tatuador.index');
    }
}
