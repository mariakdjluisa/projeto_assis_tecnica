<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEquipamento;

class TipoEquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposEquipamento = TipoEquipamento::all();
        return view('tipos_equipamento.index', compact('tiposEquipamento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos_equipamento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TipoEquipamento::create($request->all());
        return redirect()->route('tipo-equipamento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipoEquipamento = TipoEquipamento::findOrFail($id);
        return view('tipos_equipamento.show', compact('tipoEquipamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipoEquipamento = TipoEquipamento::findOrFail($id);
        return view('tipos_equipamento.edit', compact('tipoEquipamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipoEquipamento = TipoEquipamento::findOrFail($id);
        $tipoEquipamento->update($request->all());
        return redirect()->route('tipo-equipamento.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipoEquipamento = TipoEquipamento::findOrFail($id);
        $tipoEquipamento->delete();
        return redirect()->route('tipo-equipamento.index');
    }
}