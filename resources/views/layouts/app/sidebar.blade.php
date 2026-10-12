<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                {{-- GRUPO DO MENU: agrupa os links do sistema sob o título "Assistência Técnica".
                     Antes o título era "Platform" (padrão do starter kit). --}}
                <flux:sidebar.group :heading="__('Assistência Técnica')" class="grid">

                    {{-- LEGENDA DOS ATRIBUTOS (valem para todos os links abaixo):
                         icon          = ícone mostrado ao lado do texto
                         :href         = URL do link, gerada pelo nome da rota com route()
                         :current      = destaca o item quando a página aberta pertence àquele CRUD
                         wire:navigate = troca de página mais rápida, sem recarregar tudo --}}

                    {{-- DASHBOARD: serve para voltar à tela inicial do sistema.
                         Rota: dashboard (routes/web.php) --}}
                    <flux:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:sidebar.item>

                    {{-- CLIENTES: serve para acessar a listagem de clientes (cadastro, edição e exclusão).
                         Rota: cliente.index -> ClientesController@index | Tabela: clientes --}}
                    <flux:sidebar.item icon="users" :href="route('cliente.index')" :current="request()->routeIs('cliente.*')" wire:navigate>
                        {{ __('Clientes') }}
                    </flux:sidebar.item>

                    {{-- CATEGORIAS: serve para acessar o CRUD de categorias (usadas para classificar os tipos de serviço).
                         Rota: categorias.index -> CategoriaController@index | Tabela: categoria --}}
                    <flux:sidebar.item icon="tag" :href="route('categorias.index')" :current="request()->routeIs('categorias.*')" wire:navigate>
                        {{ __('Categorias') }}
                    </flux:sidebar.item>

                    {{-- TIPOS DE SERVIÇO: serve para acessar o CRUD dos serviços oferecidos (ex: formatação, troca de tela),
                         cada um com valor base e ligado a uma categoria (FK categoria_id).
                         Rota: tipo-servico.index -> TipoServicoController@index | Tabela: tipos_servico --}}
                    <flux:sidebar.item icon="wrench" :href="route('tipo-servico.index')" :current="request()->routeIs('tipo-servico.*')" wire:navigate>
                        {{ __('Tipos de Serviço') }}
                    </flux:sidebar.item>

                    {{-- TIPOS DE EQUIPAMENTO: serve para acessar o CRUD dos tipos de equipamento atendidos (ex: notebook, impressora).
                         Rota: tipo-equipamento.index -> TipoEquipamentoController@index | Tabela: tipos_equipamento --}}
                    <flux:sidebar.item icon="computer-desktop" :href="route('tipo-equipamento.index')" :current="request()->routeIs('tipo-equipamento.*')" wire:navigate>
                        {{ __('Tipos de Equipamento') }}
                    </flux:sidebar.item>

                    {{-- ORDENS DE SERVIÇO: serve para acessar o CRUD principal do sistema, onde cada atendimento é registrado.
                         Liga cliente + tipo de equipamento + tipo de serviço (3 chaves estrangeiras).
                         Rota: ordem-servico.index -> OrdemServicoController@index | Tabela: ordens_servico --}}
                    <flux:sidebar.item icon="clipboard-document-list" :href="route('ordem-servico.index')" :current="request()->routeIs('ordem-servico.*')" wire:navigate>
                        {{ __('Ordens de Serviço') }}
                    </flux:sidebar.item>

                    {{-- TÉCNICOS: serve para acessar o CRUD dos técnicos que atendem as ordens de serviço.
                         Rota: tecnico.index -> TecnicoController@index | Tabela: tecnicos --}}
                    <flux:sidebar.item icon="user-circle" :href="route('tecnico.index')" :current="request()->routeIs('tecnico.*')" wire:navigate>
                        {{ __('Técnicos') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>

            {{-- SPACER: espaço flexível que empurra o menu do usuário para o rodapé da barra lateral --}}
            <flux:spacer />

            {{-- REMOVIDO: os links "Repository" e "Documentation" vinham do starter kit do Laravel
                 e não faziam parte do projeto, por isso foram retirados. --}}

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>