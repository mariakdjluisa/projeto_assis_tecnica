{{-- FORMULÁRIO DE CADASTRO DE TIPO DE SERVIÇO: serve para cadastrar um novo serviço oferecido (ex: formatação).
     Rota: tipo-servico.create (exibe) e tipo-servico.store (salva) -> TipoServicoController
     Tabela: tipos_servico (FK: categoria_id -> categoria) | Estilo: public/css/crud.css --}}
<x-layouts::app title="Novo Tipo de Serviço">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Novo Tipo de Serviço</h1>

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

        {{-- O formulário envia os dados por POST para a rota tipo-servico.store --}}
        <form action="{{ route('tipo-servico.store') }}" method="POST">
            {{-- @csrf = token de segurança obrigatório em formulários Laravel --}}
            @csrf

            {{-- Cada .campo agrupa label + campo (um embaixo do outro).
                 old() devolve o que a pessoa já tinha digitado, caso o formulário volte com erro --}}
            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
            </div>

            <div class="campo">
                <label for="valor_base">Valor base</label>
                <input type="number" step="0.01" name="valor_base" id="valor_base" value="{{ old('valor_base') }}">
            </div>

            {{-- CATEGORIA (chave estrangeira): a lista vem do Controller ($categorias, tabela categoria).
                 O value de cada opção é o id, que vai para a coluna categoria_id.
                 @selected mantém marcada a categoria escolhida se o formulário voltar com erro --}}
            <div class="campo">
                <label for="categoria_id">Categoria</label>
                <select name="categoria_id" id="categoria_id" required>
                    <option value="">Selecione...</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Salvar (botão principal) e Cancelar (volta para a listagem, rota tipo-servico.index) --}}
            <div class="botoes-form">
                <button type="submit" class="btn btn-principal">Salvar</button>
                <a href="{{ route('tipo-servico.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </section>
</x-layouts::app>