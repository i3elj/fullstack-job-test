<x-guest-layout>
    @push("vite")
        @vite(["resources/js/products/form-validation.ts"])
    @endpush

    <div class="mx-auto">
        <h2 class="mb-6">Editar Produto</h2>
        <form id="product-form" class="flex flex-col gap-4 text-start" method="POST" action="{{ route('products.update', ['id' => $product->id]) }}">
            @csrf
            @method("PUT")

            <label class="flex flex-col">
                Nome
                <input type="text" name="name" placeholder="Nome do produto" value="{{ $product->name }}" required />
                <span id="name-error" class="hidden list-disc ml-4 text-red-400">Nome nao pode estar vazio</span>
            </label>

            <label class="flex flex-col">
                Categoria
                <input type="text" name="category" placeholder="Categoria do produto" value="{{ $product->category }}" required />
                <span id="category-error" class="hidden list-disc ml-4 text-red-400">Categoria nao pode estar vazia</span>
            </label>

            <label class="flex flex-col">
                Preco
                <input type="number" name="price" placeholder="5.29" value="{{ $product->price }}" required />
                <ul>
                   <li class="price-errors hidden list-disc ml-4 text-red-400">Caracteres especiais nao sao permitidos</li>
                   <li class="price-errors hidden list-disc ml-4 text-red-400">O preco deve ser abaixo de 1 milhao</li>
                </ul>
            </label>

            <button type="submit" class="p-2 border rounded hover:bg-slate-300">Salvar</button>

            <div id="notifications" class="flex flex-col gap-2"></div>
        </form>
    </div>
</x-guest-layout>
