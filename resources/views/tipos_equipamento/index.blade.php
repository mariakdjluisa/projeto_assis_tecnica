{{-- LISTAGEM DE TIPOS DE EQUIPAMENTO: tabela com todos os tipos cadastrados (ex: notebook, impressora).
     Rota: tipo-equipamento.index -> TipoEquipamentoController@index | Tabela: tipos_equipamento
     Estilo: public/css/crud.css (as classes "crud", "btn", etc. vêm de lá) --}}
<x-layouts::app title="Tipos de Equipamento">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Tipos de Equipamento</h1>

        {{-- Mensagem de sucesso, se existir (faixa verde no CSS) --}}
        @if (session('sucesso'))
            <p class="sucesso" role="status">{{ session('sucesso') }}</p>
        @endif

        {{-- Link para o formulário de cadastro (rota tipo-equipamento.create), com cara de botão --}}
        <div class="acoes-topo">
            <a href="{{ route('tipo-equipamento.create') }}" class="btn btn-principal">+ Novo tipo de equipamento</a>
        </div>

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
                {{-- @forelse percorre os tipos vindos do Controller; o @empty trata a lista vazia --}}
                @forelse ($tiposEquipamento as $tipoEquipamento)
                    <tr>
                        <td>{{ $tipoEquipamento->id }}</td>
                        <td>{{ $tipoEquipamento->nome }}</td>
                        <td>{{ $tipoEquipamento->descricao }}</td>
                        <td class="col-acoes">
                            <a href="{{ route('tipo-equipamento.show', $tipoEquipamento) }}" class="btn">Ver</a>
                            <a href="{{ route('tipo-equipamento.edit', $tipoEquipamento) }}" class="btn">Editar</a>
                            {{-- @csrf = token de segurança; @method('DELETE') simula o DELETE no formulário --}}
                            <form action="{{ route('tipo-equipamento.destroy', $tipoEquipamento) }}" method="POST"
                                onsubmit="return confirm('Deseja excluir este tipo de equipamento?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-perigo">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="vazio">Nenhum tipo de equipamento cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>