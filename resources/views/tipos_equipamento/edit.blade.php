{{-- FORMULÁRIO DE EDIÇÃO DE TIPO DE EQUIPAMENTO: serve para alterar um tipo já cadastrado.
     Rota: tipo-equipamento.edit (exibe) e tipo-equipamento.update (salva) -> TipoEquipamentoController
     Tabela: tipos_equipamento | Estilo: public/css/crud.css --}}
<x-layouts::app title="Editar Tipo de Equipamento">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Editar Tipo de Equipamento</h1>

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

        {{-- O formulário envia para a rota tipo-equipamento.update, passando o registro que está sendo editado --}}
        <form action="{{ route('tipo-equipamento.update', $tipoEquipamento) }}" method="POST">
            @csrf
            {{-- @method('PUT') simula o PUT, pois formulário HTML só envia GET ou POST --}}
            @method('PUT')

            {{-- Cada .campo agrupa label + campo (um embaixo do outro).
                 old('campo', valor_do_banco): usa o que foi digitado, ou o dado atual se for a primeira vez --}}
            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $tipoEquipamento->nome) }}" required>
            </div>

            <div class="campo">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4" required>{{ old('descricao', $tipoEquipamento->descricao) }}</textarea>
            </div>

            {{-- Salvar (botão principal) e Cancelar (volta para a listagem, rota tipo-equipamento.index) --}}
            <div class="botoes-form">
                <button type="submit" class="btn btn-principal">Salvar</button>
                <a href="{{ route('tipo-equipamento.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </section>
</x-layouts::app>