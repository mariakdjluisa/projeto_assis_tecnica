{{-- FORMULÁRIO DE CADASTRO DE TÉCNICO: serve para cadastrar um novo técnico.
     Rota: tecnico.create (exibe) e tecnico.store (salva) -> TecnicoController | Tabela: tecnicos
     Estilo: public/css/crud.css --}}
<x-layouts::app title="Novo Técnico">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Novo Técnico</h1>

        {{-- Mostra os erros de validação, se houver (caixa vermelha no CSS) --}}
        @if ($errors->any())
            <div class="erros" role="alert">
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

            {{-- Cada .campo agrupa label + input (um embaixo do outro).
                 old() devolve o que a pessoa já tinha digitado, caso o formulário volte com erro --}}
            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
            </div>

            <div class="campo">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" required>
            </div>

            {{-- Especialidade é opcional (a coluna é nullable), por isso não tem "required" --}}
            <div class="campo">
                <label for="especialidade">Especialidade</label>
                <input type="text" name="especialidade" id="especialidade" value="{{ old('especialidade') }}">
            </div>

            {{-- Salvar (botão principal) e Cancelar (volta para a listagem, rota tecnico.index) --}}
            <div class="botoes-form">
                <button type="submit" class="btn btn-principal">Salvar</button>
                <a href="{{ route('tecnico.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </section>
</x-layouts::app>