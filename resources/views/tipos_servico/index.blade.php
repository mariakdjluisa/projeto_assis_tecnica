{{-- LISTAGEM DE TIPOS DE SERVIÇO: tabela com todos os serviços oferecidos e suas categorias.
     Rota: tipo-servico.index -> TipoServicoController@index | Tabela: tipos_servico (FK: categoria_id)
     Estilo: public/css/crud.css (as classes "crud", "btn", etc. vêm de lá) --}}
<x-layouts::app title="Tipos de Serviço">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Tipos de Serviço</h1>

        {{-- Mensagem de sucesso, se existir (faixa verde no CSS) --}}
        @if (session('sucesso'))
            <p class="sucesso" role="status">{{ session('sucesso') }}</p>
        @endif

        {{-- Link para o formulário de cadastro (rota tipo-servico.create), com cara de botão --}}
        <div class="acoes-topo">
            <a href="{{ route('tipo-servico.create') }}" class="btn btn-principal">+ Novo tipo de serviço</a>
        </div>

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
                {{-- @forelse percorre os tipos vindos do Controller; o @empty trata a lista vazia --}}
                @forelse ($tiposServico as $tipoServico)
                    <tr>
                        <td>{{ $tipoServico->id }}</td>
                        <td>{{ $tipoServico->nome }}</td>
                        <td>{{ $tipoServico->valor_base }}</td>
                        {{-- categoria é o relacionamento belongsTo do Model TipoServico; ?? cobre o caso sem categoria --}}
                        <td>{{ $tipoServico->categoria->nome ?? 'Sem categoria' }}</td>
                        <td class="col-acoes">
                            <a href="{{ route('tipo-servico.show', $tipoServico) }}" class="btn">Ver</a>
                            <a href="{{ route('tipo-servico.edit', $tipoServico) }}" class="btn">Editar</a>
                            {{-- @csrf = token de segurança; @method('DELETE') simula o DELETE no formulário --}}
                            <form action="{{ route('tipo-servico.destroy', $tipoServico) }}" method="POST"
                                onsubmit="return confirm('Deseja excluir este tipo de serviço?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-perigo">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="vazio">Nenhum tipo de serviço cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>