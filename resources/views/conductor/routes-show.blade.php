<x-layout-driver title="Rutas Asignadas">

    <h1 class="text-2xl font-bold mb-5">Rutas Asignadas - Conductor: {{ $driver->user->name }}</h1>

    @if($driverRoutes->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md">
            <p class="font-bold">No tienes rutas asignadas.</p>
            <p>Por favor, verifica más tarde.</p>
        </div>
    @else
        @foreach($driverRoutes as $driverRoute)
            <section class="flex justify-between my-4">
                <article class="w-1/2 space-y-3 rounded-md p-2 bg-gray-100">
                    <div class="flex">
                        <h4 class="w-28 text-right pr-4 font-bold">Cliente:</h4>
                        <p class="parrafo">{{ $driverRoute->route->customer->user->name }}</p> <!-- Suponiendo que tienes la relación en Route -->
                    </div>

                    <div class="flex">
                        <h4 class="w-28 text-right pr-4 font-bold">Estado:</h4>
                        <p class="parrafo">{{ $driverRoute->route->status }}</p>
                    </div>

                    <div class="flex">
                        <h4 class="w-28 text-right pr-4 font-bold">Carga:</h4>
                        <p class="parrafo">{{ $driverRoute->route->charge }}</p>
                    </div>
                    <div class="flex">
                        <h4 class="w-28 text-right pr-4 font-bold">Fecha:</h4>
                        <p class="parrafo">{{ $driverRoute->route->date }}</p>
                    </div>
                </article>

                <article class="space-y-3 rounded-md p-2 bg-gray-100">
                    <div class="flex space-x-5">
                        <h4 class="w-28 text-right pr-4 font-bold">Origen:</h4>
                        <p class="parrafo">{{ $driverRoute->route->origin }}</p>
                    </div>

                    <div class="flex space-x-5">
                        <h4 class="w-28 text-right pr-4 font-bold">Destino:</h4>
                        <p class="parrafo">{{ $driverRoute->route->destination }}</p> 
                    </div>

                    <div class="flex space-x-5">
                        <h4 class="w-28 text-right pr-4 font-bold">Distancia:</h4>
                        <p class="parrafo">{{ $driverRoute->route->distance }} km</p> 
                    </div>
                </article>
            </section>
        @endforeach
    @endif

</x-layout-driver>
