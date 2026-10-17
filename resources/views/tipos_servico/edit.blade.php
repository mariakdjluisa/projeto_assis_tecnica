{{-- FORMULÁRIO DE EDIÇÃO DE TIPO DE SERVIÇO: serve para alterar um serviço já cadastrado.
     Rota: tipo-servico.edit (exibe) e tipo-servico.update (salva) -> TipoServicoController
     Tabela: tipos_servico (FK: categoria_id -> categoria) | Estilo: public/css/crud.css --}}
<x-layouts::app title="Editar Tipo de Serviço">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Editar Tipo de Serviço</h1>

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

        {{-- O formulário envia para a rota tipo-servico.update, passando o registro que está sendo editado --}}
        <form action="{{ route('tipo-servico.update', $tipoServico) }}" method="POST">
            @csrf
            {{-- @method('PUT') simula o PUT, pois formulário HTML só envia GET ou POST --}}
            @method('PUT')

            {{-- Cada .campo agrupa label + campo (um embaixo do outro).
                 old('campo', valor_do_banco): usa o que foi digitado, ou o dado atual se for a primeira vez --}}
            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $tipoServico->nome) }}" required>
            </div>

            <div class="campo">
                <label for="valor_base">Valor base</label>
                <input type="number" step="0.01" name="valor_base" id="valor_base" value="{{ old('valor_base', $tipoServico->valor_base) }}">
            </div>

            {{-- CATEGORIA (chave estrangeira): lista vinda do Controller ($categorias, tabela categoria).
                 @selected marca a categoria atual do serviço (ou a escolhida, se o formulário voltar com erro) --}}
            <div class="campo">
                <label for="categoria_id">Categoria</label>
                <select name="categoria_id" id="categoria_id" required>
                    <option value="">Selecione...</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @selected(old('categoria_id', $tipoServico->categoria_id) == $categoria->id)>
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