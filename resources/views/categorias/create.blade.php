<x-layouts::app title="Nova Categoria">
    <section lang="pt-BR">
        <h1>Nova Categoria</h1>
        <form action="{{route('categorias.store')}}"method="POST">
            @include('categorias.form')
        </form>
    </section>
</x-layouts::app>