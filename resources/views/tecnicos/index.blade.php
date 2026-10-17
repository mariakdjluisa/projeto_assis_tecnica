{{-- LISTAGEM DE TÉCNICOS: tabela com todos os técnicos cadastrados.
     Rota: tecnico.index -> TecnicoController@index | Tabela: tecnicos
     Estilo: public/css/crud.css (as classes "crud", "btn", etc. vêm de lá) --}}
<x-layouts::app title="Técnicos">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Técnicos</h1>

        {{-- Mensagem de sucesso, se existir (faixa verde no CSS) --}}
        @if (session('sucesso'))
            <p class="sucesso" role="status">{{ session('sucesso') }}</p>
        @endif

        {{-- Link para o formulário de cadastro (rota tecnico.create), com cara de botão --}}
        <div class="acoes-topo">
            <a href="{{ route('tecnico.create') }}" class="btn btn-principal">+ Novo técnico</a>
        </div>

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
                        <td class="col-acoes">
                            <a href="{{ route('tecnico.show', $tecnico) }}" class="btn">Ver</a>
                            <a href="{{ route('tecnico.edit', $tecnico) }}" class="btn">Editar</a>
                            {{-- @csrf = token de segurança; @method('DELETE') simula o DELETE no formulário --}}
                            <form action="{{ route('tecnico.destroy', $tecnico) }}" method="POST"
                                onsubmit="return confirm('Deseja excluir este técnico?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-perigo">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="vazio">Nenhum técnico cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>