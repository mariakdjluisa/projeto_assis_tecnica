<x-layouts::app title="Detalhes do Tipo de Equipamento">
    <section lang="pt-BR">
        <h1>Detalhes do Tipo de Equipamento</h1>

        <dl>
            <dt>Código</dt>
            <dd>{{ $tipoEquipamento->id }}</dd>

            <dt>Nome</dt>
            <dd>{{ $tipoEquipamento->nome }}</dd>

            <dt>Descrição</dt>
            <dd>{{ $tipoEquipamento->descricao }}</dd>
        </dl>

        <p>
            <a href="{{ route('tipo-equipamento.edit', $tipoEquipamento) }}">Editar</a>
            <a href="{{ route('tipo-equipamento.index') }}">Voltar</a>
        </p>
    </section>
</x-layouts::app>