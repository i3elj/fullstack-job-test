<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased p-4">
        <div class="flex justify-between items-center mb-4">
            <h1>Produtos</h1>
            <button class="p-4 border bg-gray-950">Adicionar Produtos</button>
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
                <tr>
                    <td class="p-4 border">Nome</td>
                    <td class="p-4 border">Categoria</td>
                    <td class="p-4 border">Preco</td>
                    <td class="p-4 border">Data de Criacao</td>
                    <td class="p-4 border">Acoes</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
