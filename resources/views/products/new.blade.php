<x-guest-layout>
    <div class="mx-auto">
        <h2 class="mb-6">Adicionar Produto</h2>
        <form class="flex flex-col gap-4 text-start" method="POST" action="{{ route('products.create') }}">
            @csrf
            <label class="flex flex-col">
                Nome
                <input type="text" name="name" placeholder="Nome do produto" />
            </label>
            <label class="flex flex-col">
                Categoria
                <input type="text" name="category" placeholder="Categoria do produto" />
            </label>
            <label class="flex flex-col">
                Preco
                <input type="number" name="price" placeholder="5.29" />
            </label>
            <button type="submit" class="p-2 border rounded hover:bg-slate-300">Adicionar</button>
        </form>
    </div>
</x-guest-layout>
