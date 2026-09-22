<x-layouts::app title="Tipos de Equipamento">
    <section lang="pt-BR">
        <h1>Tipos de Equipamento</h1>
        @if (session('sucesso'))
        <p role="status">
            {{ session('sucesso') }}
        </p>
        @endif
        <p><a href="{{ route('tipo-equipamento.create') }}">Novo tipo de equipamento</a></p>
        <table>
            <caption>Lista de tipos de equipamento cadastrados</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tiposEquipamento as $tipoEquipamento)
                <tr>
                    <td>{{ $tipoEquipamento->id }}</td>
                    <td>{{ $tipoEquipamento->nome }}</td>
                    <td>{{ $tipoEquipamento->descricao }}</td>
                    <td>
                        <a href="{{ route('tipo-equipamento.show', $tipoEquipamento) }}">Ver</a>
                        <a href="{{ route('tipo-equipamento.edit', $tipoEquipamento) }}">Editar</a>
                        <form action="{{ route('tipo-equipamento.destroy', $tipoEquipamento) }}" method="POST"
                            onsubmit="return confirm('Deseja excluir este tipo de equipamento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Nenhum tipo de equipamento cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>