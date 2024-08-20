<x-guest-layout>
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
                        <!-- TODO: change this for js way -->
                        <form method="POST" action="{{ route('products.delete', ['id' => $product->id]) }}">
                            @csrf
                            @method("DELETE")
                            <button>Remover</button>
                        </form>
                        <a href="{{ route('products.edit', ['id' => $product->id]) }} ">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-guest-layout>
