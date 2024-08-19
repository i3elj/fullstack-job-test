<x-guest-layout>
    <h2 class="mb-6">Editar Produto</h2>
    {{ $product->name }}
    <form class="flex flex-col gap-4 text-start" method="PUT" action="/products/{{ $product->id}}">
        <label class="flex flex-col">
            Nome
            <input type="text" name="name" placeholder="Nome do produto" value="{{ $product->name }}" />
        </label>
        <label class="flex flex-col">
            Categoria
            <input type="text" name="category" placeholder="Categoria do produto" value="{{ $product->category }}"/>
        </label>
        <label class="flex flex-col">
            Preco
            <input type="number" name="price" placeholder="5.29" value="{{ $product->price }}"/>
        </label>
        <button type="submit" class="p-2 border rounded hover:bg-slate-300">Salvar</button>
    </form>
</x-guest-layout>
