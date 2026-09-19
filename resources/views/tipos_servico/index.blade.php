<x-layouts::app title="Tipos de Serviço">
    <section lang="pt-BR">
        <h1>Tipos de Serviço</h1>
        @if (session('sucesso'))
        <p role="status">
            {{ session('sucesso') }}
        </p>
        @endif
        <p><a href="{{ route('tipo-servico.create') }}">Novo tipo de serviço</a></p>
        <table>
            <caption>Lista de tipos de serviço cadastrados</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor base</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tiposServico as $tipoServico)
                <tr>
                    <td>{{ $tipoServico->id }}</td>
                    <td>{{ $tipoServico->nome }}</td>
                    <td>{{ $tipoServico->valor_base }}</td>
                    <td>{{ $tipoServico->categoria->nome ?? 'Sem categoria' }}</td>
                    <td>
                        <a href="{{ route('tipo-servico.show', $tipoServico) }}">Ver</a>
                        <a href="{{ route('tipo-servico.edit', $tipoServico) }}">Editar</a>
                        <form action="{{ route('tipo-servico.destroy', $tipoServico) }}" method="POST"
                            onsubmit="return confirm('Deseja excluir este tipo de serviço?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Nenhum tipo de serviço cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>