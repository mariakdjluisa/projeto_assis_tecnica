<x-layouts::app title="Editar Ordem de Serviço">
    <section lang="pt-BR">
        <h1>Editar Ordem de Serviço</h1>

        @if ($errors->any())
        <div role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('ordem-servico.update', $ordemServico) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" required>
                <option value="">Selecione...</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" @selected(old('cliente_id', $ordemServico->cliente_id) == $cliente->id)>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>

            <label for="tipo_equipamento_id">Tipo de Equipamento</label>
            <select name="tipo_equipamento_id" id="tipo_equipamento_id" required>
                <option value="">Selecione...</option>
                @foreach ($tiposEquipamento as $tipoEquipamento)
                    <option value="{{ $tipoEquipamento->id }}" @selected(old('tipo_equipamento_id', $ordemServico->tipo_equipamento_id) == $tipoEquipamento->id)>
                        {{ $tipoEquipamento->nome }}
                    </option>
                @endforeach
            </select>

            <label for="tipo_servico_id">Tipo de Serviço</label>
            <select name="tipo_servico_id" id="tipo_servico_id" required>
                <option value="">Selecione...</option>
                @foreach ($tiposServico as $tipoServico)
                    <option value="{{ $tipoServico->id }}" @selected(old('tipo_servico_id', $ordemServico->tipo_servico_id) == $tipoServico->id)>
                        {{ $tipoServico->nome }}
                    </option>
                @endforeach
            </select>

            <label for="marca_modelo">Marca/Modelo</label>
            <input type="text" name="marca_modelo" id="marca_modelo" value="{{ old('marca_modelo', $ordemServico->marca_modelo) }}">

            <label for="numero_serie">Número de série</label>
            <input type="text" name="numero_serie" id="numero_serie" value="{{ old('numero_serie', $ordemServico->numero_serie) }}">

            <label for="defeito_relatado">Defeito relatado</label>
            <textarea name="defeito_relatado" id="defeito_relatado" required>{{ old('defeito_relatado', $ordemServico->defeito_relatado) }}</textarea>

            <label for="status">Status</label>
            <select name="status" id="status" required>
                @foreach (['recebido', 'em analise', 'aguardando peca', 'em conserto', 'pronto', 'entregue', 'cancelado'] as $opcao)
                    <option value="{{ $opcao }}" @selected(old('status', $ordemServico->status) == $opcao)>{{ ucfirst($opcao) }}</option>
                @endforeach
            </select>

            <label for="data_entrada">Data de entrada</label>
            <input type="date" name="data_entrada" id="data_entrada" value="{{ old('data_entrada', $ordemServico->data_entrada) }}" required>

            <label for="data_previsao">Data de previsão</label>
            <input type="date" name="data_previsao" id="data_previsao" value="{{ old('data_previsao', $ordemServico->data_previsao) }}">

            <label for="data_conclusao">Data de conclusão</label>
            <input type="date" name="data_conclusao" id="data_conclusao" value="{{ old('data_conclusao', $ordemServico->data_conclusao) }}">

            <label for="valor_orcado">Valor orçado</label>
            <input type="number" step="0.01" name="valor_orcado" id="valor_orcado" value="{{ old('valor_orcado', $ordemServico->valor_orcado) }}">

            <label for="valor_final">Valor final</label>
            <input type="number" step="0.01" name="valor_final" id="valor_final" value="{{ old('valor_final', $ordemServico->valor_final) }}">

            <label for="observacoes">Observações</label>
            <textarea name="observacoes" id="observacoes">{{ old('observacoes', $ordemServico->observacoes) }}</textarea>

            <button type="submit">Salvar</button>
            <a href="{{ route('ordem-servico.index') }}">Cancelar</a>
        </form>
    </section>
</x-layouts::app>