{{-- DETALHES DO TÉCNICO: serve para exibir os dados de um técnico, sem formulário.
     Rota: tecnico.show -> TecnicoController@show | Tabela: tecnicos
     Estilo: public/css/crud.css --}}
<x-layouts::app title="Detalhes do Técnico">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Detalhes do Técnico</h1>

        {{-- Lista de descrição: cada <dt> é o nome do campo e o <dd> é o valor
             (no CSS ela vira duas colunas: rótulo à esquerda, valor à direita) --}}
        <dl>
            <dt>Código</dt>
            <dd>{{ $tecnico->id }}</dd>

            <dt>Nome</dt>
            <dd>{{ $tecnico->nome }}</dd>

            <dt>Telefone</dt>
            <dd>{{ $tecnico->telefone }}</dd>

            <dt>Especialidade</dt>
            {{-- ?? mostra o texto à direita quando o campo está vazio (a coluna é opcional) --}}
            <dd>{{ $tecnico->especialidade ?? 'Não informada' }}</dd>
        </dl>

        {{-- Editar (rota tecnico.edit) e Voltar (rota tecnico.index), lado a lado --}}
        <div class="botoes-form">
            <a href="{{ route('tecnico.edit', $tecnico) }}" class="btn btn-principal">Editar</a>
            <a href="{{ route('tecnico.index') }}" class="btn">Voltar</a>
        </div>
    </section>
</x-layouts::app>