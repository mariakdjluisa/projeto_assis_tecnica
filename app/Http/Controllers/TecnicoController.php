<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tecnico;

class TecnicoController extends Controller
{
    // Lista todos os técnicos
    public function index()
    {
        $tecnicos = Tecnico::all();
        return view('tecnicos.index', compact('tecnicos'));
    }

    // Mostra o formulário de cadastro (sem FK, então não precisa buscar nada extra)
    public function create()
    {
        return view('tecnicos.create');
    }

    // Salva o técnico enviado pelo formulário e volta para a listagem
    public function store(Request $request)
    {
        Tecnico::create($request->all());
        return redirect()->route('tecnico.index');
    }

    // Mostra os detalhes de um técnico
    public function show(string $id)
    {
        $tecnico = Tecnico::findOrFail($id);
        return view('tecnicos.show', compact('tecnico'));
    }

    // Mostra o formulário de edição, já preenchido com os dados atuais
    public function edit(string $id)
    {
        $tecnico = Tecnico::findOrFail($id);
        return view('tecnicos.edit', compact('tecnico'));
    }

    // Atualiza o técnico com os dados do formulário de edição
    public function update(Request $request, string $id)
    {
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->update($request->all());
        return redirect()->route('tecnico.index');
    }

    // Exclui o técnico
    public function destroy(string $id)
    {
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->delete();
        return redirect()->route('tecnico.index');
    }
}