<x-layout-driver

title="Rutas Asignadas al Conductor">

    <h1 class="text-3xl font-bold mb-5 text-gray-800">Rutas Asignadas a {{ $driver->user->name }}</h1>

    @if(isset($message))
        <div class="bg-yellow-200 border border-yellow-400 text-yellow-600 p-4 rounded-md mt-3">
            <p class="font-semibold">{{ $message }}</p>
        </div>
    @endif

    @if($driver->driverRoutes->isEmpty())
        <div class="bg-red-200 border border-red-400 text-red-600 p-4 rounded-md mt-3">
            <p class="font-semibold">No hay rutas asignadas para este conductor.</p>
        </div>
    @else
        <ul class="space-y-3">
            @foreach($driver->driverRoutes as $driverRoute)
                <li class="border border-gray-300 p-4 rounded-md shadow-md hover:shadow-lg transition-shadow duration-200">
                    <strong class="text-lg">Origen:</strong> {{ $driverRoute->route->origin }}<br>
                    <strong class="text-lg">Destino:</strong> {{ $driverRoute->route->destination }}<br>
                    <strong class="text-lg">Distancia:</strong> {{ $driverRoute->route->distance }} km<br>

                    @if($driverRoute->route->status === 'entregada')
                        <div class="bg-green-200 border border-green-400 text-green-600 p-2 rounded-md mt-2">
                            <p class="font-semibold">La ruta ya está entregada.</p>
                        </div>
                    @elseif($driverRoute->route->status === 'en curso')
                        <div class="bg-blue-200 border border-blue-400 text-blue-600 p-2 rounded-md mt-2">
                            <p class="font-semibold">La ruta está en curso.</p>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

</x-layout-driver>