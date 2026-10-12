<x-layouts::app title="Clientes">
    ...
</x-layouts::app>

    <h1>Lista de Clientes</h1>

    <a href="{{ route('cliente.create') }}">Novo Cliente</a>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>
                        <a href="{{ route('cliente.edit', $cliente->id) }}">Editar</a>
                        <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

<x-layouts::app>