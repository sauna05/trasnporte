<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    @vite('resources/css/app.css')
</head>
<body>


    <header class="bg-[#003366] text-white p-4 flex justify-between items-center">
        <nav class="flex space-x-4">
            <a href="{{ route('admin.vehicles') }}" class="hover:underline">Vehicles</a>
            <a href="{{route('admin.clienteForm')}}" class="hover:underline">Clientes</a>
            <a href="{{route('admin.createForm')}}" class="hover:underline"> Conductores </a>
            <a href="{{route('admin.routesForm')}}">Rutas</a>
        </nav>
    
        <form action="{{route('admin.logout')}}" method="POST" onclick="return confirmarEliminacion();" >
            @csrf
            <button type="submit" class="bg-[#FF6600] text-white rounded px-4 py-2 hover:bg-orange-600 transition duration-300">Cerrar sesión</button>
        </form>
    </header>

 
    <main class="text-center p-6">
        <h2 class="text-2xl">Hola Admin</h2>
    </main>

    <script>
        function confirmarEliminacion(){
            return confirm('¿Esta seguro que desea serrar session');
        }
    </script>

</body>
</html>