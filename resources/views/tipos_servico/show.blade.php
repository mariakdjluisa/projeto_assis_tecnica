<x-layouts::app title="Detalhes do Tipo de Serviço">
    <section lang="pt-BR">
        <h1>Detalhes do Tipo de Serviço</h1>

        <dl>
            <dt>Código</dt>
            <dd>{{ $tipoServico->id }}</dd>

            <dt>Nome</dt>
            <dd>{{ $tipoServico->nome }}</dd>

            <dt>Valor base</dt>
            <dd>{{ $tipoServico->valor_base }}</dd>

            <dt>Categoria</dt>
            <dd>{{ $tipoServico->categoria->nome ?? 'Sem categoria' }}</dd>
        </dl>

        <p>
            <a href="{{ route('tipo-servico.edit', $tipoServico) }}">Editar</a>
            <a href="{{ route('tipo-servico.index') }}">Voltar</a>
        </p>
    </section>
</x-layouts::app>