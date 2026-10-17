{{-- FORMULÁRIO DE CADASTRO DE TIPO DE EQUIPAMENTO: serve para cadastrar um novo tipo (ex: notebook, impressora).
     Rota: tipo-equipamento.create (exibe) e tipo-equipamento.store (salva) -> TipoEquipamentoController
     Tabela: tipos_equipamento | Estilo: public/css/crud.css --}}
<x-layouts::app title="Novo Tipo de Equipamento">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Novo Tipo de Equipamento</h1>

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

        {{-- O formulário envia os dados por POST para a rota tipo-equipamento.store --}}
        <form action="{{ route('tipo-equipamento.store') }}" method="POST">
            {{-- @csrf = token de segurança obrigatório em formulários Laravel --}}
            @csrf

            {{-- Cada .campo agrupa label + campo (um embaixo do outro).
                 old() devolve o que a pessoa já tinha digitado, caso o formulário volte com erro --}}
            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
            </div>

            {{-- Descrição é obrigatória nesta tabela (por isso tem "required") --}}
            <div class="campo">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4" required>{{ old('descricao') }}</textarea>
            </div>

            {{-- Salvar (botão principal) e Cancelar (volta para a listagem, rota tipo-equipamento.index) --}}
            <div class="botoes-form">
                <button type="submit" class="btn btn-principal">Salvar</button>
                <a href="{{ route('tipo-equipamento.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </section>
</x-layouts::app>