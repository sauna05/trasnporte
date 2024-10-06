<x-layout-admin
title="Rutas">


    <form action="#">

        <div class="flex space-x-10 items-center relative ">
            <div class="relative">       
                <input type="text" placeholder="Buscar..." class="w-[30rem] py-2 pl-10 pr-3  border-2 border-black rounded-md focus:outline-none parrafo ">
                <img src="{{asset('images\icons\buscar.svg')}}" alt="" class="absolute left-2 top-1/2 transform -translate-y-1/2 h-6 w-6 text-black">
            </div>
    
            <button class="btn">
                Buscar
            </button>

            <div class="flex space-x-10 items-center ">
                <div class="space-x-1">
                    <input type="checkbox" name="pendientes" id="pendientes" class="scale-150 accent-azul-principal-0 transition-all">
                    <label for="pendientes">Pendientes</label>
                </div>

                <div class="space-x-1">
                    <input type="checkbox" name="progreso" id="progreso" class="scale-150 accent-azul-principal-0 transition-all">
                    <label for="progreso">En progreso</label>
                </div>

                <div class="space-x-1">
                    <input type="checkbox" name="entregados" id="entregados" class="scale-150 accent-azul-principal-0 transition-all">
                    <label for="entregados">Entregados</label>
                </div>
            </div>

            <h2 class="fixed right-36 top-56 font-bold text-2xl ">Rutas</h2>
        </div>
    </form>

    {{-- Aqui inicia el index --}}

    <section class="space-y-8 my-5">

        {{-- cada article es un registro --}}
        <a class="w-2/3 space-y-3 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 block" href="#">
            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Cliente:</h4>
                <p class="parrafo">Nombre Cliente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Estado:</h4>
                <p class="parrafo">Pendiente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Carga:</h4>
                <p class="parrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad distinctio doloribus quasi ducimus nam exercitationem voluptatem perferendis adipisci, architecto minus magnam obcaecati, libero quisquam accusamus tenetur. Rerum labore autem architecto sint numquam nisi totam debitis, praesentium possimus provident necessitatibus explicabo.</p>
            </div>
        </a>


        {{-- Los de abajo están puestos de prueba --}}


        <a class="w-2/3 space-y-3 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 block" href="#">
            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Cliente:</h4>
                <p class="parrafo">Nombre Cliente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Estado:</h4>
                <p class="parrafo">Pendiente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Carga:</h4>
                <p class="parrafo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae quo unde distinctio est ducimus, libero quibusdam illo repellat molestiae dignissimos!</p>
            </div>
        </a>


        <a class="w-2/3 space-y-3 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 block" href="#">
            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Cliente:</h4>
                <p class="parrafo">Nombre Cliente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Estado:</h4>
                <p class="parrafo">Pendiente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-bold">Carga:</h4>
                <p class="parrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad distinctio doloribus quasi ducimus nam exercitationem voluptatem perferendis adipisci, architecto minus magnam obcaecati, libero quisquam accusamus tenetur. Rerum labore autem architecto sint numquam nisi totam debitis, praesentium possimus provident necessitatibus explicabo.</p>
            </div>
        </a>
        


    </section>
   
</x-layout-admin>