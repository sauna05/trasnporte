<x-layout-admin
title="Vehiculos">

    <section class="space-y-8 my-5 relative">
        
                    

        <div class="fixed right-36 top-40 font-bold text-2xl flex flex-col justify-center items-center space-y-5">
            <h2 class="mb-14">Vehiculos</h2>
            <img src="{{asset('images\icons\anadir-camion.png')}}" alt="">
            <a href="#" class=" btn flex justify-center items-center ">Añadir Vehiculo</a>
        </div>

        {{-- primer camion --}}

        <a class="flex  w-2/4  border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5 " href="#">
          
            <div class="flex justify-center items-center">
                <img src="{{asset('images\camion-por-defecto.png')}}" class="w-48" alt="">
           </div>

           <article class="space-y-5 self-center">
                <div class="flex space-x-5">
                    <h4 class="w-20 text-right  font-bold">Tipo:</h4>
                    <p class="parrafo">Tipo de camion</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-20 text-right  font-bold">Capacidad:</h4>
                    <p class="parrafo">12000 k</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-20 text-right  font-bold">Estado:</h4>
                    <p class="parrafo">Disponible</p>
                </div>  
            </article>
        </a>

        {{-- Camiones de prueba --}}

        <a class="flex  w-2/4  border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5 " href="#">
          
            <div class="flex justify-center items-center">
                <img src="{{asset('images\trucks\camion1.png')}}" class="w-48" alt="">
           </div>

           <article class="space-y-5 self-center">
                <div class="flex space-x-5">
                    <h4 class="w-20 text-right  font-bold">Tipo:</h4>
                    <p class="parrafo">Camion Contenedor</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-20 text-right  font-bold">Capacidad:</h4>
                    <p class="parrafo">25000 k</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-20 text-right  font-bold">Estado:</h4>
                    <p class="parrafo">Mantenimiento</p>
                </div>  
            </article>
        </a>

        <a class="flex  w-2/4  border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5 " href="#">
          
            <div class="flex justify-center items-center">
                <img src="{{asset('images\trucks\camion2.png')}}" class="w-48" alt="">
           </div>

           <article class="space-y-5 self-center">
                <div class="flex space-x-5">
                    <h4 class="w-20 text-right  font-bold">Tipo:</h4>
                    <p class="parrafo">Camion con Carpa</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-20 text-right  font-bold">Capacidad:</h4>
                    <p class="parrafo">32300 k</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-20 text-right  font-bold">Estado:</h4>
                    <p class="parrafo">Ocupado</p>
                </div>  
            </article>
        </a>


    </section>

</x-layout-adminz>
