<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    
    public function index()
    {
        //Lista as informações da tabela, no caso tabela clientes

        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));


    }

    
    public function create()
    {
        //Cria um novo item (formulário) VIEW
        return view('clientes.create');
    }

    
    public function store(Request $request)
    {
        //Armazena as informações do formulário ->create
    }

    public function show(string $id)
    {
        //Mostrar os detalhes do item(informação)
    }

   
    public function edit(string $id)
    {
        //Pagina responsvael pela edição do item (formulario)
        return view('clientes.edit');
    }

    
    public function update(Request $request, string $id)
    {
        //Atualiza os registros com base no formulario de edição (edit0)
    }

    
    public function destroy(string $id)
    {
        //Deletea os registros (item) armazenado conforme em base o seu ID
    }
}
