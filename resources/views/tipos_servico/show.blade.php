{{-- DETALHES DO TIPO DE SERVIÇO: serve para exibir os dados de um serviço, sem formulário.
     Rota: tipo-servico.show -> TipoServicoController@show | Tabela: tipos_servico (FK: categoria_id)
     Estilo: public/css/crud.css --}}
<x-layouts::app title="Detalhes do Tipo de Serviço">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Detalhes do Tipo de Serviço</h1>

        {{-- Lista de descrição: cada <dt> é o nome do campo e o <dd> é o valor
             (no CSS ela vira duas colunas: rótulo à esquerda, valor à direita) --}}
        <dl>
            <dt>Código</dt>
            <dd>{{ $tipoServico->id }}</dd>

            <dt>Nome</dt>
            <dd>{{ $tipoServico->nome }}</dd>

            <dt>Valor base</dt>
            <dd>{{ $tipoServico->valor_base }}</dd>

            <dt>Categoria</dt>
            {{-- categoria é o relacionamento belongsTo do Model; ?? cobre o caso sem categoria --}}
            <dd>{{ $tipoServico->categoria->nome ?? 'Sem categoria' }}</dd>
        </dl>

        {{-- Editar (rota tipo-servico.edit) e Voltar (rota tipo-servico.index), lado a lado --}}
        <div class="botoes-form">
            <a href="{{ route('tipo-servico.edit', $tipoServico) }}" class="btn btn-principal">Editar</a>
            <a href="{{ route('tipo-servico.index') }}" class="btn">Voltar</a>
        </div>
    </section>
</x-layouts::app>