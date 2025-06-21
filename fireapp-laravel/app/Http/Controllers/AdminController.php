<?php

namespace App\Http\Controllers;

use App\Models\Incendio;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Filtros
        $query = Incendio::query();

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->input('tipo'));
        }

        if ($request->filled('gravidade')) {
            $query->where('gravidade', $request->input('gravidade'));
        }

        // Estatísticas
        $total = Incendio::count();
        $graves = Incendio::where('gravidade', 'Grave')->count();

        $incendios = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.dashboard', compact('incendios', 'total', 'graves'));
    }
}
