<x-layout-admin title="Clientes">
    <section class="space-y-8 my-5 relative">
        <div class="fixed right-36 top-40 font-bold text-2xl flex flex-col justify-center items-center space-y-5">
            <h2 class="mb-14">Clientes</h2>
            <img src="{{ asset('images/icons/anadir-cliente.png') }}" alt="">
            <a href="{{ route('admin.clienteForm') }}" class="btn flex justify-center items-center">Añadir Cliente</a>
        </div>

        {{-- Listado de Clientes --}}
        @if ($customers && $customers->isNotEmpty())
            @foreach ($customers as $customer)
                <a class="flex w-2/4 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5" href="#">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('images/cliente-por-defecto.png') }}" class="w-36" alt="">
                    </div>

                    <article class="space-y-8 self-center">
                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Documento:</h4>
                            <p class="parrafo">{{ $customer->user->document }}</p>
                        </div>

                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Nombre:</h4>
                            <p class="parrafo">{{ $customer->user->name }}</p>
                        </div>

                        <div class="flex space-x-5">
                            <h4 class="w-28 text-right font-bold">Correo:</h4>
                            <p class="parrafo">{{ $customer->user->email }}</p>
                        </div>
                    </article>
                </a>
            @endforeach
        @else
            <div class="text-center text-lg font-semibold text-gray-700">
                No hay clientes registrados.
            </div>
        @endif
    </section>
</x-layout-admin>