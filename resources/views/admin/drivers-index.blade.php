<x-layout-admin
title="Conductores">

    <section class="space-y-8 my-5 relative">
        
                    

        <div class="fixed right-36 top-40 font-bold text-2xl flex flex-col justify-center items-center space-y-5">
            <h2 class="mb-14">Conductores</h2>
            <img src="{{asset('images\icons\anadir-conductor.png')}}" alt="">
            <a href="#" class=" btn flex justify-center items-center ">Añadir Conductor</a>
        </div>

        {{-- primer camion --}}

        <a class="flex  w-2/4  border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5 " href="#">
          
            <div class="flex justify-center items-center">
                <img src="{{asset('images\conductor-por-defecto.png')}}" class="w-36" alt="">
           </div>

           <article class="space-y-5 self-center">
                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Nombre:</h4>
                    <p class="parrafo">Nombre de Conductor</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Licencia:</h4>
                    <p class="parrafo">Tipo B</p>
                </div>

                <div class="flex space-x-5 ">
                    <h4 class="w-28 text-right  font-bold">Experiencia:</h4>
                    <p class="parrafo">5 años</p>
                </div> 

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Disponibilidad:</h4>
                    <p class="parrafo">Ocupado</p>
                </div>  
            </article>
        </a>

        {{-- Conductores de prueba --}}

        <a class="flex  w-2/4  border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5 " href="#">
          
            <div class="flex justify-center items-center">
                <img src="{{asset('images\drivers\driver-.avif')}}" class="w-36" alt="">
           </div>

           <article class="space-y-5 self-center">
                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Nombre:</h4>
                    <p class="parrafo">Kaiser Perez</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Licencia:</h4>
                    <p class="parrafo">Tipo A</p>
                </div>

                <div class="flex space-x-5 ">
                    <h4 class="w-28 text-right  font-bold">Experiencia:</h4>
                    <p class="parrafo">3 años</p>
                </div> 

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Disponibilidad:</h4>
                    <p class="parrafo">Disponible</p>
                </div>  
            </article>
        </a>


        <a class="flex  w-2/4  border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5 " href="#">
          
            <div class="flex justify-center items-center">
                <img src="{{asset('images\drivers\driver-1.avif')}}" class="w-36" alt="">
           </div>

           <article class="space-y-5 self-center">
                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Nombre:</h4>
                    <p class="parrafo">Kaiser Perez</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Licencia:</h4>
                    <p class="parrafo">Tipo A</p>
                </div>

                <div class="flex space-x-5 ">
                    <h4 class="w-28 text-right  font-bold">Experiencia:</h4>
                    <p class="parrafo">3 años</p>
                </div> 

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Disponibilidad:</h4>
                    <p class="parrafo">Disponible</p>
                </div>  
            </article>
        </a>

    </section>

</x-layout-adminz>
