<x-app-layout>
    @push("vite")
        @vite(["resources/js/products/delete-item.ts"])
    @endpush

    <div class="m-auto mt-4 w-fit">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Produtos</h1>
            <a href="{{ route('products.new') }}" class="p-2 border rounded bg-white hover:bg-slate-50" >
                Adicionar Produtos
            </a>
        </div>

        <table class="my-4 mx-auto bg-white">
            <thead>
                <tr>
                    <th class="p-4 border">Nome</th>
                    <th class="p-4 border">Categoria</th>
                    <th class="p-4 border">Preço</th>
                    <th class="p-4 border">Data de Criação</th>
                    <th class="p-4 border">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="p-4 border text-center">{{ $product->name }}</td>
                        <td class="p-4 border text-center">{{ $product->category }}</td>
                        <td class="p-4 border text-center">R$ {{ $product->price }}</td>
                        <td class="p-4 border text-center">{{ $product->created_at->format('d/m/Y') }}</td>
                        <td class="p-4 border text-center flex">
                            <button class="delete-button"
                                data-route="{{ route('products.delete', ['id' => $product->id]) }}"
                                data-name="{{ $product->name }}">
                                    @csrf
                                    <x-icons.delete class="w-3/4" />
                                </button>
                            <a href="{{ route('products.edit', ['id' => $product->id]) }} ">
                                <x-icons.edit class="w-3/4" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <dialog id="confirmation-dialog" class="p-4 open:flex flex-col gap-4 items-center rounded">
            <p class="w-3/4 text-center">Você realmente gostaria de excluir o seguinte produto?</p>
            <p id="product" class="text-red-500">"Abacaxi"</p>
            <div class="flex gap-3">
                <button id="confirm" class="p-2 rounded border border-green-500 bg-green-100 text-green-950">
                    Sim, excluir
                </button>
                <button id="cancel" class="p-2 rounded border border-red-500 bg-red-100 text-red-950">
                    Cancelar operação
                </button>
            </div>
        </dialog>

        {{ $products->links() }}

        <div id="notifications" class="flex flex-col gap-2"></div>
    </div>
</x-app-layout>
