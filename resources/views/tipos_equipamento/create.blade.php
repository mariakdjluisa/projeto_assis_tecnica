<x-layouts::app title="Novo Tipo de Equipamento">
    <section lang="pt-BR">
        <h1>Novo Tipo de Equipamento</h1>

        @if ($errors->any())
        <div role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('tipo-equipamento.store') }}" method="POST">
            @csrf

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>

            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" required>{{ old('descricao') }}</textarea>

            <button type="submit">Salvar</button>
            <a href="{{ route('tipo-equipamento.index') }}">Cancelar</a>
        </form>
    </section>
</x-layouts::app>