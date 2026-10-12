{{-- DETALHES DO TÉCNICO: serve para exibir os dados de um técnico, sem formulário.
     Rota: tecnico.show -> TecnicoController@show | Tabela: tecnicos --}}
<x-layouts::app title="Detalhes do Técnico">
    <section lang="pt-BR">
        <h1>Detalhes do Técnico</h1>

        {{-- Lista de descrição: cada <dt> é o nome do campo e o <dd> é o valor --}}
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

        <p>
            <a href="{{ route('tecnico.edit', $tecnico) }}">Editar</a>
            <a href="{{ route('tecnico.index') }}">Voltar</a>
        </p>
    </section>
</x-layouts::app>