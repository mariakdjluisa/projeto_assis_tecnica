{{-- FORMULÁRIO DE EDIÇÃO DE TÉCNICO: serve para alterar os dados de um técnico já cadastrado.
     Rota: tecnico.edit (exibe) e tecnico.update (salva) -> TecnicoController | Tabela: tecnicos --}}
<x-layouts::app title="Editar Técnico">
    <section lang="pt-BR">
        <h1>Editar Técnico</h1>

        {{-- Mostra os erros de validação, se houver --}}
        @if ($errors->any())
        <div role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- O formulário envia para a rota tecnico.update, passando o técnico que está sendo editado --}}
        <form action="{{ route('tecnico.update', $tecnico) }}" method="POST">
            @csrf
            {{-- @method('PUT') simula o PUT, pois formulário HTML só envia GET ou POST --}}
            @method('PUT')

            {{-- old('campo', valor_do_banco): usa o que foi digitado, ou o dado atual do técnico se for a primeira vez --}}
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $tecnico->nome) }}" required>

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $tecnico->telefone) }}" required>

            <label for="especialidade">Especialidade</label>
            <input type="text" name="especialidade" id="especialidade" value="{{ old('especialidade', $tecnico->especialidade) }}">

            <button type="submit">Salvar</button>
            <a href="{{ route('tecnico.index') }}">Cancelar</a>
        </form>
    </section>
</x-layouts::app>