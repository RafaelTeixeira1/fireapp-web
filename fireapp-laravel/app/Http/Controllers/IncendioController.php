<?php

namespace App\Http\Controllers;

use App\Models\Incendio;
use Illuminate\Http\Request;

class IncendioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Incendio::query();

        if ($request->filled('tipo')) {
            $query->where('tipo', 'like', '%' . $request->tipo . '%');
        }

        if ($request->filled('gravidade')) {
            $query->where('gravidade', 'like', '%' . $request->gravidade . '%');
        }

        $incendios = $query->get();

        return view('incendios.index', compact('incendios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incendios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:255',
            'gravidade' => 'required|string|max:255',
            'descricao' => 'required|string',
            'ponto_referencia' => 'nullable|string|max:255',
            'area_poligono' => 'required|string',
        ]);

        Incendio::create($validated);

        return redirect()->route('incendios.index')->with('success', 'Incêndio cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incendio $incendio)
    {
        return view('incendios.show', compact('incendio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incendio $incendio)
    {
        return view('incendios.edit', compact('incendio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incendio $incendio)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:255',
            'gravidade' => 'required|string|max:255',
            'descricao' => 'required|string',
            'ponto_referencia' => 'nullable|string|max:255',
            'area_poligono' => 'nullable|string',
        ]);

        $incendio->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Incêndio atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incendio $incendio)
    {
        $incendio->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Incêndio excluído com sucesso!');
    }
}
