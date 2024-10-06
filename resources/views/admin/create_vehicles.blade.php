<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Vehicle</title>
   @vite('resources/css/app.css')  <!-- Asegúrate de incluir Tailwind CSS -->
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center text-[#FF6600]">Registrar Vehículo</h2>
        
        <form method="POST" action="{{ route('register_vehicle') }}">
            @csrf

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                <input name="type" type="text" id="type" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-[#FF6600] focus:border-[#FF6600]">
            </div>

            <div class="mb-4">
                <label for="capacity" class="block text-sm font-medium text-gray-700">Capacidad (kg)</label>
                <input name="capacity" type="text" id="capacity" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-[#FF6600] focus:border-[#FF6600]">
            </div>

            {{-- <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                <input name="status" type="text" id="status" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-[#FF6600] focus:border-[#FF6600]">
            </div> --}}

            <button type="submit" class="w-full bg-[#FF6600] text-white rounded-md py-2 hover:bg-orange-600 transition duration-300">Agregar Vehículo</button>
        </form>
    </div>

</body>
</html>