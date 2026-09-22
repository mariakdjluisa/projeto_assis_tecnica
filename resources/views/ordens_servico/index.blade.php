<x-layouts::app title="Ordens de Serviço">
    <section lang="pt-BR">
        <h1>Ordens de Serviço</h1>
        @if (session('sucesso'))
        <p role="status">
            {{ session('sucesso') }}
        </p>
        @endif
        <p><a href="{{ route('ordem-servico.create') }}">Nova ordem de serviço</a></p>
        <table>
            <caption>Lista de ordens de serviço cadastradas</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Equipamento</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data entrada</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ordensServico as $ordemServico)
                <tr>
                    <td>{{ $ordemServico->id }}</td>
                    <td>{{ $ordemServico->cliente->nome ?? '-' }}</td>
                    <td>{{ $ordemServico->tipoEquipamento->nome ?? '-' }}</td>
                    <td>{{ $ordemServico->tipoServico->nome ?? '-' }}</td>
                    <td>{{ $ordemServico->status }}</td>
                    <td>{{ $ordemServico->data_entrada }}</td>
                    <td>
                        <a href="{{ route('ordem-servico.show', $ordemServico) }}">Ver</a>
                        <a href="{{ route('ordem-servico.edit', $ordemServico) }}">Editar</a>
                        <form action="{{ route('ordem-servico.destroy', $ordemServico) }}" method="POST"
                            onsubmit="return confirm('Deseja excluir esta ordem de serviço?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Nenhuma ordem de serviço cadastrada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>