{{-- FORMULÁRIO DE EDIÇÃO DE TÉCNICO: serve para alterar os dados de um técnico já cadastrado.
     Rota: tecnico.edit (exibe) e tecnico.update (salva) -> TecnicoController | Tabela: tecnicos
     Estilo: public/css/crud.css --}}
<x-layouts::app title="Editar Técnico">
    {{-- class="crud": liga esta tela ao estilo do crud.css --}}
    <section class="crud" lang="pt-BR">
        <h1>Editar Técnico</h1>

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

        {{-- O formulário envia para a rota tecnico.update, passando o técnico que está sendo editado --}}
        <form action="{{ route('tecnico.update', $tecnico) }}" method="POST">
            @csrf
            {{-- @method('PUT') simula o PUT, pois formulário HTML só envia GET ou POST --}}
            @method('PUT')

            {{-- Cada .campo agrupa label + input (um embaixo do outro).
                 old('campo', valor_do_banco): usa o que foi digitado, ou o dado atual do técnico se for a primeira vez --}}
            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $tecnico->nome) }}" required>
            </div>

            <div class="campo">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $tecnico->telefone) }}" required>
            </div>

            <div class="campo">
                <label for="especialidade">Especialidade</label>
                <input type="text" name="especialidade" id="especialidade" value="{{ old('especialidade', $tecnico->especialidade) }}">
            </div>

            {{-- Salvar (botão principal) e Cancelar (volta para a listagem, rota tecnico.index) --}}
            <div class="botoes-form">
                <button type="submit" class="btn btn-principal">Salvar</button>
                <a href="{{ route('tecnico.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </section>
</x-layouts::app>