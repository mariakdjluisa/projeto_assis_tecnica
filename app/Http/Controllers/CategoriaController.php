<?php

namespace App\Http\Controllers;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categoria::create($this->validar($request));
        return redirect()->route('categorias.index')
         ->with('sucesso', 'Categoria cadastrada com sucesso');
    }


    private function validar(Request $request)
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'descricao' => ['nullable', 'string', 'max:1000'],

        ], [
            'nome.required' => 'Informe o nome da categoria',
            'nome.string' => 'o nome deve ser um texto',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres',
            'descricao.string' => 'A descrição deve ser um texto',
            'descricao.max' => 'A descrição deve ter no máximo 1000 caracteres',    
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($this->validar($request));
        return redirect()->route('categorias.index')
         ->with('sucesso', 'categoria atualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')
         ->with('sucesso', 'Categoria excluida com sucesso!');
    }
}
