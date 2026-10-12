{{-- FORMULÁRIO DE CADASTRO DE TÉCNICO: serve para cadastrar um novo técnico.
     Rota: tecnico.create (exibe) e tecnico.store (salva) -> TecnicoController | Tabela: tecnicos --}}
<x-layouts::app title="Novo Técnico">
    <section lang="pt-BR">
        <h1>Novo Técnico</h1>

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

        {{-- O formulário envia os dados por POST para a rota tecnico.store (método store do Controller) --}}
        <form action="{{ route('tecnico.store') }}" method="POST">
            {{-- @csrf = token de segurança obrigatório em formulários Laravel --}}
            @csrf

            {{-- old() devolve o que a pessoa já tinha digitado, caso o formulário volte com erro --}}
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" required>

            {{-- Especialidade é opcional (a coluna é nullable), por isso não tem "required" --}}
            <label for="especialidade">Especialidade</label>
            <input type="text" name="especialidade" id="especialidade" value="{{ old('especialidade') }}">

            <button type="submit">Salvar</button>
            <a href="{{ route('tecnico.index') }}">Cancelar</a>
        </form>
    </section>
</x-layouts::app>