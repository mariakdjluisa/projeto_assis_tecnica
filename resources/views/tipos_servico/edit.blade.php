<x-layouts::app title="Editar Tipo de Serviço">
    <section lang="pt-BR">
        <h1>Editar Tipo de Serviço</h1>

        @if ($errors->any())
        <div role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('tipo-servico.update', $tipoServico) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $tipoServico->nome) }}" required>

            <label for="valor_base">Valor base</label>
            <input type="number" step="0.01" name="valor_base" id="valor_base" value="{{ old('valor_base', $tipoServico->valor_base) }}">

            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" id="categoria_id" required>
                <option value="">Selecione...</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected(old('categoria_id', $tipoServico->categoria_id) == $categoria->id)>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Salvar</button>
            <a href="{{ route('tipo-servico.index') }}">Cancelar</a>
        </form>
    </section>
</x-layouts::app>