<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\TipoServico;


class TipoServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposServico = TipoServico::all();
        return view('tipos_servico.index', compact('tiposServico'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias= Categoria::all();
        return view('tipos_servico.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        TipoServico::create($request->all());
        return redirect()->route('tipo-servico.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipoServico = TipoServico::findOrFail($id);
        return view('tipos_servico.show', compact('tipoServico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipoServico = TipoServico::findOrFail($id);
        $categorias = Categoria::all();
        return view('tipos_servico.edit', compact('tipoServico', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipoServico = TipoServico::findOrFail($id);
        $tipoServico->update($request->all());
        return redirect()->route('tipo-servico.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipoServico = TipoServico::findOrFail($id);
        $tipoServico->delete();
        return redirect()->route('tipo-servico.index');
    }
}
