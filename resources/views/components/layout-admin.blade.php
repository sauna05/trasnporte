<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col">

    <header class="flex flex-col ">
        <div class="py-2 px-4 flex justify-between items-center">
            <img src="{{ asset('images/icons/logo.svg') }}" alt="" class="h-20">
            <h3 class="text-2xl font-semibold">Administrator</h3>
            <form action="{{route('admin.logout')}}" method="POST" onclick="return confirmarEliminacion();" >
                @csrf
                <button type="submit" class="btn">Cerrar sesión</button>
            </form>
        </div>

        <nav class="flex text-center h-11 bg-azul-principal-0 justify-between items-center">
            <a href="{{ route('admin.vehicles') }}" class="text-fondo-0 font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Rutas</a>
            <a href="{{ route('admin.vehicles') }}" class="text-fondo-0 font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Conductores</a>
            <a href="{{ route('admin.vehicles') }}" class="text-fondo-0 font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Vehiculos</a>
            <a href="{{ route('admin.vehicles') }}" class="text-fondo-0 font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Clientes</a>
            <a href="{{ route('admin.vehicles') }}" class="text-fondo-0 font-medium w-full h-full flex items-center justify-center hover:bg-[#2B71B7] transition-all">Reportes</a>
        </nav>
    </header>

    {{--  Contenido principal --}}
    <main class="flex-grow  p-6">
        {{$slot}}
    </main>


    <footer class="h-11 bg-azul-principal-0 text-center p-2">
        <p class="text-fondo-0 font-medium">@TransportFast</p> 
    </footer>

    <script>
        function confirmarEliminacion(){
            return confirm('¿Está seguro que desea cerrar sesión?');
        }
    </script>

</body>
</html>
