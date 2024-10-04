<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Conductor</title>
    @vite('resources/css/app.css') <!-- Asegúrate de incluir el archivo CSS de Tailwind -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Registrar Conductor</h2>

        <!-- Mostrar Mensajes de Éxito o Error -->
        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.registerDriver') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Asegúrate de incluir este token CSRF para la seguridad -->
            
            <div class="mb-4">
                <label for="document" class="block text-sm font-medium text-gray-700">Documento</label>
                <input type="text" name="document" id="document" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" placeholder="Ingrese su documento">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" placeholder="Ingrese su nombre">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" placeholder="Ingrese su email">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" placeholder="Ingrese su contraseña">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" placeholder="Confirme su contraseña">
            </div>

            <div class="mb-4">
                <label for="license" class="block text-sm font-medium text-gray-700">Licencia</label>
                <input type="text" name="license" id="license" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" placeholder="Ingrese su licencia">
            </div>

            <div class="mb-4">
                <label for="experience" class="block text-sm font-medium text-gray-700">Experiencia (en años)</label>
                <input type="number" name="experience" id="experience" required min="0" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="file" name="imagen" id="imagen" accept=".jpeg,.png,.jpg,gif" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </div>

            <div class="">
                <label for="role_id">Rol</label>
                <select name ="role_id" id="" required class="mt - 1 block w - full p - 2 border border - gray - 300 rounded - md focus : ring focus : ring - blue - 300 ">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type ="submit "class="w - full bg - blue - 600 hover:bg - blue - 700 text - white font - bold py - 2 rounded - md transition duration - 200 ">Registrar</button>
        </form>  
    </div>

</body>
</html>