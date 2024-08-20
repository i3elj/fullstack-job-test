<x-guest-layout>
    @push("vite")
        @vite(["resources/js/products/delete-item.ts"])
    @endpush

    <div class="flex justify-between items-center mb-4">
        <h1>Produtos</h1>
        <a href="{{ route('products.new') }}" class="p-4 border hover:bg-gray-50" >
            Adicionar Produtos
        </a>
    </div>

    <table class="my-4 mx-auto">
        <thead>
            <tr>
                <th class="p-4 border">Nome</th>
                <th class="p-4 border">Categoria</th>
                <th class="p-4 border">Preco</th>
                <th class="p-4 border">Data de Criacao</th>
                <th class="p-4 border">Acoes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="p-4 border">{{ $product->name }}</td>
                    <td class="p-4 border">{{ $product->category }}</td>
                    <td class="p-4 border">{{ $product->price }}</td>
                    <td class="p-4 border">{{ $product->created_at }}</td>
                    <td class="p-4 border">
                        <button class="delete-button"
                            data-route="{{ route('products.delete', ['id' => $product->id]) }}"
                            data-name="{{ $product->name }}">
                                @csrf
                                <p>Remover</p>
                            </button>
                        <a href="{{ route('products.edit', ['id' => $product->id]) }} ">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <dialog id="confirmation-dialog" class="p-4 open:flex flex-col gap-4 items-center rounded">
        <p class="w-3/4 text-center">Voce realmente gostaria de remover o seguinte produto?</p>
        <p id="product" class="text-red-500">"Abacaxi"</p>
        <div class="flex gap-3">
            <button id="confirm" class="p-2 rounded border border-green-500 bg-green-100 text-green-950">
                Sim, remover produto
            </button>
            <button id="cancel" class="p-2 rounded border border-red-500 bg-red-100 text-red-950">
                Cancelar operacao
            </button>
        </div>
    </dialog>

    {{ $products->links() }}

    <div id="notifications" class="flex flex-col gap-2"></div>
</x-guest-layout>
