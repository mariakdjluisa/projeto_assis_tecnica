{{-- DETALHES DO TIPO DE EQUIPAMENTO: serve para exibir os dados de um tipo, sem formulário.
     Rota: tipo-equipamento.show -> TipoEquipamentoController@show | Tabela: tipos_equipamento
     Estilo: public/css/crud.css --}}
<x-layouts::app title="Detalhes do Tipo de Equipamento">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Detalhes do Tipo de Equipamento</h1>

        {{-- Lista de descrição: cada <dt> é o nome do campo e o <dd> é o valor
             (no CSS ela vira duas colunas: rótulo à esquerda, valor à direita) --}}
        <dl>
            <dt>Código</dt>
            <dd>{{ $tipoEquipamento->id }}</dd>

            <dt>Nome</dt>
            <dd>{{ $tipoEquipamento->nome }}</dd>

            <dt>Descrição</dt>
            <dd>{{ $tipoEquipamento->descricao }}</dd>
        </dl>

        {{-- Editar (rota tipo-equipamento.edit) e Voltar (rota tipo-equipamento.index), lado a lado --}}
        <div class="botoes-form">
            <a href="{{ route('tipo-equipamento.edit', $tipoEquipamento) }}" class="btn btn-principal">Editar</a>
            <a href="{{ route('tipo-equipamento.index') }}" class="btn">Voltar</a>
        </div>
    </section>
</x-layouts::app>