<x-layouts::app title="Editar Tipo de Equipamento">
    <section lang="pt-BR">
        <h1>Editar Tipo de Equipamento</h1>

        @if ($errors->any())
        <div role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('tipo-equipamento.update', $tipoEquipamento) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $tipoEquipamento->nome) }}" required>

            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" required>{{ old('descricao', $tipoEquipamento->descricao) }}</textarea>

            <button type="submit">Salvar</button>
            <a href="{{ route('tipo-equipamento.index') }}">Cancelar</a>
        </form>
    </section>
</x-layouts::app>