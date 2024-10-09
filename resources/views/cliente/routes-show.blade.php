<x-layout-customer title="Ruta">

    <h1 class="text-2xl font-bold mb-5">Nombre Cliente - Route</h1>


    @if($customer->orders->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md">
            <p class="font-bold">No tienes rutas o pedidos creados.</p>
            <p>Por favor, verifica más tarde .</p>
        </div>
    @else
        @foreach($customer->orders as $order)
            <section class="flex justify-between">
                <article class="w-1/2 space-y-3 rounded-md p-2 ">
                    <div class="flex">
                        <h4 class="w-16 text-right pr-4 font-bold">Cliente:</h4>
                        <p class="parrafo">{{ $customer->user->name }}</p>
                    </div>

                    <div class="flex">
                        <h4 class="w-16 text-right pr-4 font-bold">Estado:</h4>
                        <p class="parrafo">{{ $order->route->status }}</p>
                    </div>

                    <div class="flex">
                        <h4 class="w-16 text-right pr-4 font-bold">Carga:</h4>
                        <p class="parrafo">{{ $order->charge }}</p>
                    </div>
                    <div class="flex">
                        <h4 class="w-16 text-right pr-4 font-bold">Fecha:</h4>
                        <p class="parrafo">{{ $order->date }}</p>
                    </div>
                </article>

                <article class="space-y-3 rounded-md p-2">
                    <div class="flex space-x-5">
                        <h4 class="w-16 text-right pr-4 font-bold">Origen:</h4>
                        <p class="parrafo">{{ $order->route->origin }}</p>
                    </div>

                    <div class="flex space-x-5">
                        <h4 class="w-16 text-right pr-4 font-bold">Destino:</h4>
                        <p class="parrafo">{{ $order->route->destination }}</p> 
                    </div>

                    <div class="flex space-x-5">
                        <h4 class="w-16 text-right pr-4 font-bold">Distancia:</h4>
                        <p class="parrafo">{{ $order->route->distance }} km</p> 
                    </div>
                </article>
            </section>
        @endforeach
    @endif

</x-layout-customer>