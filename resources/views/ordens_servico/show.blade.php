<x-layouts::app title="Detalhes da Ordem de Serviço">
    <section lang="pt-BR">
        <h1>Detalhes da Ordem de Serviço</h1>

        <dl>
            <dt>Código</dt>
            <dd>{{ $ordemServico->id }}</dd>

            <dt>Cliente</dt>
            <dd>{{ $ordemServico->cliente->nome ?? '-' }}</dd>

            <dt>Tipo de Equipamento</dt>
            <dd>{{ $ordemServico->tipoEquipamento->nome ?? '-' }}</dd>

            <dt>Tipo de Serviço</dt>
            <dd>{{ $ordemServico->tipoServico->nome ?? '-' }}</dd>

            <dt>Marca/Modelo</dt>
            <dd>{{ $ordemServico->marca_modelo }}</dd>

            <dt>Número de série</dt>
            <dd>{{ $ordemServico->numero_serie }}</dd>

            <dt>Defeito relatado</dt>
            <dd>{{ $ordemServico->defeito_relatado }}</dd>

            <dt>Status</dt>
            <dd>{{ ucfirst($ordemServico->status) }}</dd>

            <dt>Data de entrada</dt>
            <dd>{{ $ordemServico->data_entrada }}</dd>

            <dt>Data de previsão</dt>
            <dd>{{ $ordemServico->data_previsao ?? '-' }}</dd>

            <dt>Data de conclusão</dt>
            <dd>{{ $ordemServico->data_conclusao ?? '-' }}</dd>

            <dt>Valor orçado</dt>
            <dd>{{ $ordemServico->valor_orcado ?? '-' }}</dd>

            <dt>Valor final</dt>
            <dd>{{ $ordemServico->valor_final ?? '-' }}</dd>

            <dt>Observações</dt>
            <dd>{{ $ordemServico->observacoes ?? '-' }}</dd>
        </dl>

        <p>
            <a href="{{ route('ordem-servico.edit', $ordemServico) }}">Editar</a>
            <a href="{{ route('ordem-servico.index') }}">Voltar</a>
        </p>
    </section>
</x-layouts::app>