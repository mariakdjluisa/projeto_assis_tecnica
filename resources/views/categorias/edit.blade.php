<x-layouts::app title="Editar Categoria">
    <section lang="pt-BR">
        <h1>Editar Categoria</h1>

        <form action="{{route('categorias.update',$categoria)}}"method="POST">
            @method('PUT')
            @include('categorias.form')
        </form>
    </section>
</x-layouts::app>