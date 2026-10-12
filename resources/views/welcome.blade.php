<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- CABEÇALHO DO HTML: codificação, tamanho da tela no celular e título da aba do navegador --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ __('Welcome') }} - {{ config('app.name', 'Laravel') }}</title>

        {{-- ÍCONE DA ABA (favicon): mantido do arquivo original do Laravel --}}
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        {{-- FONTES: diretiva do Laravel que carrega as fontes do projeto (mantida do original) --}}
        @fonts

        {{-- ESTILO DA PÁGINA: o CSS fica no arquivo separado public/css/welcome.css.
             asset() gera a URL do arquivo a partir da pasta public. --}}
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    </head>
    <body>

        {{-- MENU DO TOPO: mostra o botão certo conforme o usuário está logado ou não.
             Route::has() confere se a rota existe antes de criar o link, evitando erro. --}}
        @if (Route::has('login'))
            <nav class="topo">
                {{-- @auth: aparece só para usuário logado. Serve para ir ao painel (rota: dashboard) --}}
                @auth
                    <a href="{{ route('dashboard') }}" class="botao">Dashboard</a>
                {{-- @else: aparece para quem não está logado. Serve para entrar ou criar conta --}}
                @else
                    <a href="{{ route('login') }}" class="botao">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="botao">Register</a>
                    @endif
                @endauth
            </nav>
        @endif

        <main>
            {{-- TÍTULO E DESCRIÇÃO: apresentam o sistema (antes era "Let's get started" do Laravel) --}}
            <h1>Assistência Técnica de Informática</h1>
            <p class="descricao">Sistema para controlar clientes, equipamentos, técnicos e ordens de serviço de uma assistência técnica.</p>

            {{-- CARDS DOS CRUDs: cada card é um link para a listagem de um cadastro do projeto.
                 route() gera a URL a partir do nome da rota criado pelo Route::resource no web.php. --}}
            <div class="cards">

                {{-- CLIENTES: serve para cadastrar e consultar quem traz os equipamentos.
                     Rota: cliente.index -> ClientesController@index | Tabela: clientes --}}
                <a href="{{ route('cliente.index') }}" class="card">
                    <h2>Clientes</h2>
                    <p>Cadastro das pessoas que trazem equipamentos.</p>
                </a>

                {{-- CATEGORIAS: serve para classificar os tipos de serviço.
                     Rota: categorias.index -> CategoriaController@index | Tabela: categoria --}}
                <a href="{{ route('categorias.index') }}" class="card">
                    <h2>Categorias</h2>
                    <p>Classificação dos tipos de serviço.</p>
                </a>

                {{-- TIPOS DE SERVIÇO: serve para cadastrar os serviços oferecidos e seus valores base.
                     Rota: tipo-servico.index -> TipoServicoController@index | Tabela: tipos_servico (FK: categoria_id) --}}
                <a href="{{ route('tipo-servico.index') }}" class="card">
                    <h2>Tipos de Serviço</h2>
                    <p>Serviços oferecidos e seus valores base.</p>
                </a>

                {{-- TIPOS DE EQUIPAMENTO: serve para cadastrar os tipos de equipamento atendidos (notebook, impressora...).
                     Rota: tipo-equipamento.index -> TipoEquipamentoController@index | Tabela: tipos_equipamento --}}
                <a href="{{ route('tipo-equipamento.index') }}" class="card">
                    <h2>Tipos de Equipamento</h2>
                    <p>Notebook, desktop, impressora e outros.</p>
                </a>

                {{-- ORDENS DE SERVIÇO: serve para registrar e acompanhar cada atendimento (cadastro principal).
                     Rota: ordem-servico.index -> OrdemServicoController@index
                     Tabela: ordens_servico (FKs: cliente_id, tipo_equipamento_id, tipo_servico_id) --}}
                <a href="{{ route('ordem-servico.index') }}" class="card">
                    <h2>Ordens de Serviço</h2>
                    <p>Registro e acompanhamento de cada atendimento.</p>
                </a>

                {{-- TÉCNICOS: serve para cadastrar e consultar os técnicos que atendem as ordens de serviço.
                     Rota: tecnico.index -> TecnicoController@index | Tabela: tecnicos --}}
                <a href="{{ route('tecnico.index') }}" class="card">
                    <h2>Técnicos</h2>
                    <p>Cadastro dos técnicos que realizam os atendimentos.</p>
                </a>
            </div>
        </main>

        {{-- RODAPÉ: identificação do trabalho --}}
        <footer>Trabalho de Tópicos Especiais em Desenvolvimento de Software — Laravel</footer>
    </body>
</html>