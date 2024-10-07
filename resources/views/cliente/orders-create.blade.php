<x-layout-customer
title="Hacer Pedido">

    <h1 class="text-2xl font-bold mb-6">Crear Pedido</h1>

    @if(session('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('cliente.registerOrder') }}" method="POST">
        @csrf

        <div class="flex justify-center items-center">
            <section class="grid grid-cols-2 items-center gap-x-5 gap-y-2">

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="charge" class="font-medium text-gray-700 self-start py-1">Carga</label>
                    <input type="text" name="charge" id="charge"  class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" required>
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="origin" class="font-medium text-gray-700 self-start py-1">Origen</label>
                    <input type="text" name="origin" id="origin" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" required>
                </div>
        
                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="destination" class="font-medium text-gray-700 self-start py-1">Destino</label>
                    <input type="text" name="destination" id="destination" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" required>
                </div>
        
                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="distance" class="font-medium text-gray-700 self-start py-1">Distancia (km)</label>
                    <input type="number" name="distance" id="distance" step="0.01" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" required>
                </div>
        
                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="date" class="font-medium text-gray-700 self-start py-1">Fecha</label>
                    <input type="date" name="date" id="date" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" required>
                </div>
                
            </section>

        </div>
       
            <button type="submit" class="btn">Crear Pedido</button>
    </form>
</div>

</x-layout-customer>
   
