<x-app-layout>
    @push("vite")
        @vite(["resources/js/products/form-validation.ts"])
    @endpush

    <div class="m-auto w-fit">
        <h2 class="mb-6 mt-4 text-lg text-center">Adicionar Produto</h2>
        <form id="product-form" class="flex flex-col gap-4 text-start" method="POST" action="{{ route('products.create') }}">
            @csrf
            <label class="flex flex-col">
                Nome
                <input type="text" name="name" placeholder="Nome do produto" required />
                <span id="name-error" class="hidden list-disc ml-4 text-red-400">Nome não pode estar vazio</span>
            </label>

            <label class="flex flex-col">
                Categoria
                <input type="text" name="category" placeholder="Categoria do produto" required />
                <span id="category-error" class="hidden list-disc ml-4 text-red-400">Categoria não pode estar vazia</span>
            </label>

            <label class="flex flex-col">
                Preço
                <input type="text" name="price" placeholder="R$ 5.29" required />
                <ul>
                   <li class="price-errors hidden list-disc ml-4 text-red-400">Caracteres especiais não são permitidos</li>
                   <li class="price-errors hidden list-disc ml-4 text-red-400">O preço deve ser abaixo de 1 milhao</li>
                </ul>
            </label>

            <button type="submit" class="p-2 border rounded hover:bg-slate-300">Adicionar</button>

            <div id="notifications" class="flex flex-col gap-2"></div>
        </form>
    </div>
</x-app-layout>
