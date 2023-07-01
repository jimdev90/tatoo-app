<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with(['tatuador', 'user'])
            ->orderBy('id', 'desc')
            ->get();
        return Inertia::render('Cita/Index', [
            'citas' => $citas
        ]);
    }
}
