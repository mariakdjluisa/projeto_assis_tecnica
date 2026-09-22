<x-layouts::app title="Nova Ordem de Serviço">
    <section lang="pt-BR">
        <h1>Nova Ordem de Serviço</h1>

        @if ($errors->any())
        <div role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('ordem-servico.store') }}" method="POST">
            @csrf

            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" required>
                <option value="">Selecione...</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" @selected(old('cliente_id') == $cliente->id)>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>

            <label for="tipo_equipamento_id">Tipo de Equipamento</label>
            <select name="tipo_equipamento_id" id="tipo_equipamento_id" required>
                <option value="">Selecione...</option>
                @foreach ($tiposEquipamento as $tipoEquipamento)
                    <option value="{{ $tipoEquipamento->id }}" @selected(old('tipo_equipamento_id') == $tipoEquipamento->id)>
                        {{ $tipoEquipamento->nome }}
                    </option>
                @endforeach
            </select>

            <label for="tipo_servico_id">Tipo de Serviço</label>
            <select name="tipo_servico_id" id="tipo_servico_id" required>
                <option value="">Selecione...</option>
                @foreach ($tiposServico as $tipoServico)
                    <option value="{{ $tipoServico->id }}" @selected(old('tipo_servico_id') == $tipoServico->id)>
                        {{ $tipoServico->nome }}
                    </option>
                @endforeach
            </select>

            <label for="marca_modelo">Marca/Modelo</label>
            <input type="text" name="marca_modelo" id="marca_modelo" value="{{ old('marca_modelo') }}">

            <label for="numero_serie">Número de série</label>
            <input type="text" name="numero_serie" id="numero_serie" value="{{ old('numero_serie') }}">

            <label for="defeito_relatado">Defeito relatado</label>
            <textarea name="defeito_relatado" id="defeito_relatado" required>{{ old('defeito_relatado') }}</textarea>

            <label for="status">Status</label>
            <select name="status" id="status" required>
                @foreach (['recebido', 'em analise', 'aguardando peca', 'em conserto', 'pronto', 'entregue', 'cancelado'] as $opcao)
                    <option value="{{ $opcao }}" @selected(old('status') == $opcao)>{{ ucfirst($opcao) }}</option>
                @endforeach
            </select>

            <label