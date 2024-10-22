{{-- <x-layout-admin 
title="Rutas Asignadas al Conductor">

    <h1 class="text-3xl font-bold mb-5 text-gray-800">Rutas Asignadas a {{ $driver->user->name }}</h1>

   

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

</x-layout-admin> --}}


<x-layout-admin title="Rutas Asignadas al Conductor">

    <h1 class="text-3xl font-bold mb-5 text-gray-800">Rutas Asignadas a {{ $driver->user->name }}</h1>

    @if($driver->driverRoutes->isEmpty())
        <div class="bg-red-200 border border-red-400 text-red-600 p-4 rounded-md mt-3">
            <p class="font-semibold">No hay rutas asignadas para este conductor.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Origen</th>
                        <th class="py-3 px-6 text-left">Destino</th>
                        <th class="py-3 px-6 text-left">Distancia (km)</th>
                        <th class="py-3 px-6 text-left">Estado</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($driver->driverRoutes as $driverRoute)
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $driverRoute->route->origin }}</td>
                            <td class="py-3 px-6">{{ $driverRoute->route->destination }}</td>
                            <td class="py-3 px-6">{{ $driverRoute->route->distance }}</td>
                            <td class="py-3 px-6">
                                @if($driverRoute->route->status === 'entregada')
                                    <span class="bg-green-200 text-green-600 py-1 px-2 rounded-full text-xs">Entregada</span>
                                @elseif($driverRoute->route->status === 'en curso')
                                    <span class="bg-blue-200 text-blue-600 py-1 px-2 rounded-full text-xs">En </span>
                                @else
                                    <span class="bg-yellow-200 text-yellow-600 py-1 px-2 rounded-full text-xs">{{ $driverRoute->route->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</x-layout-admin>