<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Cliente;
use App\Models\TipoEquipamento;
use App\Models\TipoServico;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordensServico = OrdemServico::all();
        return view('ordens_servico.index', compact('ordensServico'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $tiposEquipamento = TipoEquipamento::all();
        $tiposServico = TipoServico::all();
        return view('ordens_servico.create', compact('clientes', 'tiposEquipamento', 'tiposServico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        OrdemServico::create($request->all());
        return redirect()->route('ordem-servico.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordemServico = OrdemServico::findOrFail($id);
        return view('ordens_servico.show', compact('ordemServico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ordemServico = OrdemServico::findOrFail($id);
        $clientes = Cliente::all();
        $tiposEquipamento = TipoEquipamento::all();
        $tiposServico = TipoServico::all();
        return view('ordens_servico.edit', compact('ordemServico', 'clientes', 'tiposEquipamento', 'tiposServico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ordemServico = OrdemServico::findOrFail($id);
        $ordemServico->update($request->all());
        return redirect()->route('ordem-servico.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ordemServico = OrdemServico::findOrFail($id);
        $ordemServico->delete();
        return redirect()->route('ordem-servico.index');
    }
}