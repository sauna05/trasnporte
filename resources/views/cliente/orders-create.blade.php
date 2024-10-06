<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Pedido</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Crear Pedido</h1>

        @if(session('message'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('cliente.registerOrder') }}" method="POST" class="bg-blue-100 p-6 rounded shadow-md grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf

            <div class="mb-4">
                <label for="charge" class="block text-gray-700">Carga</label>
                <input type="text" name="charge" id="charge" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label for="origin" class="block text-gray-700">Origen</label>
                <input type="text" name="origin" id="origin" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label for="destination" class="block text-gray-700">Destino</label>
                <input type="text" name="destination" id="destination" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label for="distance" class="block text-gray-700">Distancia (km)</label>
                <input type="number" name="distance" id="distance" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700">Fecha</label>
                <input type="date" name="date" id="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>

           
            <div class="col-span-full">
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition duration-200">Crear Pedido</button>
            </div>
        </form>
    </div>
</body>
</html>