{{-- LISTAGEM DE TÉCNICOS: tabela com todos os técnicos cadastrados.
     Rota: tecnico.index -> TecnicoController@index | Tabela: tecnicos --}}
<x-layouts::app title="Técnicos">
    <section lang="pt-BR">
        <h1>Técnicos</h1>

        {{-- Mensagem de sucesso, se existir --}}
        @if (session('sucesso'))
        <p role="status">{{ session('sucesso') }}</p>
        @endif

        {{-- Link para o formulário de cadastro (rota tecnico.create) --}}
        <p><a href="{{ route('tecnico.create') }}">Novo técnico</a></p>

        <table>
            <caption>Lista de técnicos cadastrados</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Especialidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse percorre os técnicos vindos do Controller; o @empty trata a lista vazia --}}
                @forelse ($tecnicos as $tecnico)
                <tr>
                    <td>{{ $tecnico->id }}</td>
                    <td>{{ $tecnico->nome }}</td>
                    <td>{{ $tecnico->telefone }}</td>
                    <td>{{ $tecnico->especialidade ?? 'Não informada' }}</td>
                    <td>
                        <a href="{{ route('tecnico.show', $tecnico) }}">Ver</a>
                        <a href="{{ route('tecnico.edit', $tecnico) }}">Editar</a>
                        {{-- @csrf = token de segurança; @method('DELETE') simula o DELETE no formulário --}}
                        <form action="{{ route('tecnico.destroy', $tecnico) }}" method="POST"
                            onsubmit="return confirm('Deseja excluir este técnico?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Nenhum técnico cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>