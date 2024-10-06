<x-layout-admin
title="Rutas">


    <form action="#">

        <div class="flex space-x-10 items-center ">
            <div class="relative">       
                <input type="text" placeholder="Buscar..." class="w-[30rem] py-2 pl-10 pr-3  border-2 border-black rounded-md focus:outline-none ">
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
        </div>
    </form>

    {{-- Aqui inicia el index --}}

    <section class="space-y-8 my-5">

        {{-- cada article es un registro --}}
        <a class="w-2/3 space-y-3 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 block" href="#">
            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-semibold">Cliente:</h4>
                <p>Nombre Cliente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-semibold">Estado:</h4>
                <p>Pendiente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-semibold">Carga:</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem ratione dolorum quas distinctio. Inventore error ea neque officia eaque voluptatem?</p>
            </div>
        </a>


        {{-- Los de abajo están puestos de prueba --}}

        
        <a class="w-2/3 space-y-3 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 block" href="#">
            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-semibold">Cliente:</h4>
                <p>Nombre Cliente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-semibold">Estado:</h4>
                <p>Pendiente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-semibold">Carga:</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem ratione dolorum quas distinctio. Inventore error ea neque officia eaque voluptatem?</p>
            </div>
        </a>

        <a class="w-2/3 space-y-3 border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 block" href="#">
            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-semibold">Cliente:</h4>
                <p>Nombre Cliente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-semibold">Estado:</h4>
                <p>Pendiente</p>
            </div>

            <div class="flex">
                <h4 class="w-16 text-right pr-4 font-semibold">Carga:</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem ratione dolorum quas distinctio. Inventore error ea neque officia eaque voluptatem?</p>
            </div>
        </a>

    </section>
   
</x-layout-admin>