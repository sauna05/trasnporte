{{-- <x-layout-admin title="Rutas">
    <form action="{{ route('admin.showDocument') }}" method="GET">
        <div class="flex space-x-10 items-center relative">
            <div class="relative">       
                <input type="text" placeholder="Buscar..." name="document" class="w-[30rem] py-2 pl-10 pr-3 border-2 border-black rounded-md focus:outline-none parrafo">
                <img src="{{ asset('images/icons/buscar.svg') }}" alt="Buscar" class="absolute left-2 top-1/2 transform -translate-y-1/2 h-6 w-6 text-black">
            </div>

            <button type="submit" class="btn">Buscar</button>

            <div class="flex space-x-10 items-center">
                <div class="space-x-1">
                    <input type="checkbox" name="pendientes" id="pendientes" value="1" class="scale-150 accent-azul-principal-0 transition-all">
                    <label for="pendientes">Pendientes</label>
                </div>

                <div class="space-x-1">
                    <input type="checkbox" name="progreso" id="progreso" value="1" class="scale-150 accent-azul-principal-0 transition-all">
                    <label for="progreso">En progreso</label>
                </div>

                <div class="space-x-1">
                    <input type="checkbox" name="entregados" id="entregados" value="1" class="scale-150 accent-azul-principal-0 transition-all">
                    <label for="entregados">Entregados</label>
                </div>
            </div>

            <h2 class="fixed right-36 top-56 font-bold text-2xl">Rutas</h2>
        </div>
    </form>

    {{-- Aquí inicia el index 
    <section class="space-y-8 my-5">
        @if($customers->isEmpty() && isset($document))
            <div class="text-center text-lg font-semibold text-gray-700 bg-red-200 border border-red-400 rounded p-4">
                No se encontró un cliente con ese documento.
            </div>
        @elseif($customers->isEmpty())
            <div class="text-center text-lg font-semibold text-gray-700 bg-yellow-200 border border-yellow-400 rounded p-4">
                No hay rutas registradas.
            </div>
        @else
            @foreach($customers as $customer)
                @if($customer->user) 
                    @foreach($customer->orders as $order)
                        @if($order->route) 
                            <a class="w-2/3 space-y-3 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 block" href="{{ route('admin.routes-show', $order->id) }}">
                                <div class="flex">
                                    <h4 class="w-24 text-right pr-4 font-bold">Documento:</h4>
                                    <p class="parrafo">{{ $customer->user->document }}</p>
                                </div>

                                <div class="flex">
                                    <h4 class="w-24 text-right pr-4 font-bold">Cliente:</h4>
                                    <p class="parrafo">{{ $customer->user->name }}</p>
                                </div>

                                <div class="flex">
                                    <h4 class="w-24 text-right pr-4 font-bold">Estado:</h4>
                                    <p class="parrafo">{{ $order->route->status }}</p>
                                </div>

                                <div class="flex">
                                    <h4 class="w-24 text-right pr-4 font-bold">Carga:</h4>
                                    <p class="parrafo">{{ $order->charge }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
    </section>
</x-layout-admin> --}}


<x-layout-admin title="Rutas">
    <form action="{{ route('admin.showDocument') }}" method="GET">
        <div class="flex space-x-10 items-center relative">
            <div class="relative">       
                <input type="text" placeholder="Buscar..." name="document" class="w-[30rem] py-2 pl-10 pr-3 border-2 border-black rounded-md focus:outline-none parrafo">
                <img src="{{ asset('images/icons/buscar.svg') }}" alt="Buscar" class="absolute left-2 top-1/2 transform -translate-y-1/2 h-6 w-6 text-black">
            </div>

            <button type="submit" class="btn">Buscar</button>

            <div class="flex space-x-10 items-center">
                <div class="space-x-1">
                    <input type="checkbox" name="pendientes" id="pendientes" value="1" class="scale-150 accent-azul-principal-0 transition-all">
                    <label for="pendientes">Pendientes</label>
                </div>

                <div class="space-x-1">
                    <input type="checkbox" name="progreso" id="progreso" value="1" class="scale-150 accent-azul-principal-0 transition-all">
                    <label for="progreso">En progreso</label>
                </div>

                <div class="space-x-1">
                    <input type="checkbox" name="entregados" id="entregados" value="1" class="scale-150 accent-azul-principal-0 transition-all">
                    <label for="entregados">Entregados</label>
                </div>
            </div>

        </div>
    </form>

    {{-- Aquí inicia el index --}}
    <section class="space-y-8 my-5">
        @if($customers->isEmpty() && isset($document))
            <div class="text-center text-lg font-semibold text-gray-700 bg-red-200 border border-red-400 rounded p-4">
                No se encontró un cliente con ese documento.
            </div>
        @elseif($customers->isEmpty())
            <div class="text-center text-lg font-semibold text-gray-700 bg-yellow-200 border border-yellow-400 rounded p-4">
                No hay rutas registradas.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Documento</th>
                            <th class="py-3 px-6 text-left">Cliente</th>
                            <th class="py-3 px-6 text-left">Estado</th>
                            <th class="py-3 px-6 text-left">Carga</th>
                            <th class="py-3 px-6 text-left">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($customers as $customer)
                            @if($customer->user) 
                                @foreach($customer->orders as $order)
                                    @if($order->route) 
                                        <tr class="border-b border-gray-300 hover:bg-gray-100 cursor-pointer" onclick="window.location='{{ route('admin.routes-show', $order->id) }}'">
                                            <td class="py-3 px-6">{{ $customer->user->document }}</td>
                                            <td class="py-3 px-6">{{ $customer->user->name }}</td>
                                            <td class="py-3 px-6">{{ $order->route->status }}</td>
                                            <td class="py-3 px-6">{{ $order->charge }}</td>
                                            <td class="py-3 px-6">
                                                  
                                            @if($order->route->status === 'entregada')
                                            <span class="bg-green-200 text-green-600 py-1 px-2 rounded-full text-xs">Entregada</span>
                                        @elseif($order->route->status === 'en curso')
                                            <span class="bg-blue-200 text-blue-600 py-1 px-2 rounded-full text-xs">En progreso</span>
                                        
        
                                        @else
                                            <span class="bg-yellow-200 text-yellow-600 py-1 px-2 rounded-full text-xs">{{ $order->route->status }}</span>
                                        @endif

                                            </td>
                                          
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</x-layout-admin>
