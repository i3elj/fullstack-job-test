<x-app-layout>
    @push("vite")
        @vite(["resources/js/products/form-validation.ts"])
    @endpush

    <div class="m-auto mt-4 w-fit">
        <h2 class="mb-6">Editar Produto</h2>
        <form id="product-form" class="flex flex-col gap-4 text-start" method="POST" action="{{ route('products.update', ['id' => $product->id]) }}">
            @csrf
            @method("PUT")

            <label class="flex flex-col">
                Nome
                <input type="text" name="name" placeholder="Nome do produto" value="{{ $product->name }}" required />
                <span id="name-error" class="hidden list-disc ml-4 text-red-400">Nome não pode estar vazio</span>
            </label>

            <label class="flex flex-col">
                Categoria
                <input type="text" name="category" placeholder="Categoria do produto" value="{{ $product->category }}" required />
                <span id="category-error" class="hidden list-disc ml-4 text-red-400">Categoria não pode estar vazia</span>
            </label>

            <label class="flex flex-col">
                Preço
                <input type="number" name="price" placeholder="5.29" value="{{ $product->price }}" required />
                <ul>
                   <li class="price-errors hidden list-disc ml-4 text-red-400">Caracteres especiais não são permitidos</li>
                   <li class="price-errors hidden list-disc ml-4 text-red-400">O preço deve ser abaixo de 1 milhao</li>
                </ul>
            </label>

            <button type="submit" class="p-2 border rounded hover:bg-slate-300">Salvar</button>

            <div id="notifications" class="flex flex-col gap-2"></div>
        </form>
    </div>
</x-app-layout>
