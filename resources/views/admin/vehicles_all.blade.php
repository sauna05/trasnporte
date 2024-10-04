<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicles</title>
    @vite('resources/css/app.css') <!-- Asegúrate de incluir Tailwind CSS -->
</head>
<body class="bg-gray-100 p-6">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Lista de Vehículos</h1>
        <a href="{{ route('create_vehicle_view') }}" class="bg-[#FF6600] text-white rounded px-4 py-2 hover:bg-orange-600 transition duration-300">Agregar Vehículos</a>
    </div>

    <div class="flex flex-col space-y-6">
        @foreach ($vehicles as $vehicle)
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-xl font-semibold">{{ $vehicle->type }}</h2>
                <p class="text-gray-700">Capacidad: {{ $vehicle->capacity }} kg </p>
                <small class="text-gray-500">Estado: {{ $vehicle->status }}</small>
            </div>
        @endforeach
    </div>

</body>
</html>