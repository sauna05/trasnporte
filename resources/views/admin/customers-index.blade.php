<x-layout-admin
title="Clientes">

    <section class="space-y-8 my-5 relative">
        
                    

        <div class="fixed right-36 top-40 font-bold text-2xl flex flex-col justify-center items-center space-y-5">
            <h2 class="mb-14">Clientes</h2>
            <img src="{{asset('images\icons\anadir-cliente.png')}}" alt="">
            <a href="#" class=" btn flex justify-center items-center ">Añadir Cliente</a>
        </div>

        {{-- primer cliente --}}

        <a class="flex  w-2/4  border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5 " href="#">
          
            <div class="flex justify-center items-center">
                <img src="{{asset('images\cliente-por-defecto.png')}}" class="w-36" alt="">
           </div>

           <article class="space-y-8 self-center">

            <div class="flex space-x-5">
                <h4 class="w-28 text-right  font-bold">Documento:</h4>
                <p class="parrafo">2133433211</p>
            </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Nombre:</h4>
                    <p class="parrafo">Nombre de Cliente</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Correo:</h4>
                    <p class="parrafo">kaiserp3r3s@gmail.com</p>
                </div>

            </article>
        </a>

        {{-- Conductores de prueba --}}

        <a class="flex  w-2/4  border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5 " href="#">
          
            <div class="flex justify-center items-center">
                <img src="{{asset('images\customers\cliente-1.jfif')}}" class="w-36" alt="">
           </div>

           <article class="space-y-8 self-center">

            <div class="flex space-x-5">
                <h4 class="w-28 text-right  font-bold">Documento:</h4>
                <p class="parrafo">2133433211</p>
            </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Nombre:</h4>
                    <p class="parrafo">Nombre de Cliente</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Correo:</h4>
                    <p class="parrafo">kaiserp3r3s@gmail.com</p>
                </div>

            </article>
        </a>


        <a class="flex  w-2/4  border-b-2 border-gray-500 hover:bg-gray-300/50 rounded-md p-2 space-x-5 " href="#">
          
            <div class="flex justify-center items-center">
                <img src="{{asset('images\customers\cliente-2.webp')}}" class="w-36" alt="">
           </div>

           <article class="space-y-8 self-center">

            <div class="flex space-x-5">
                <h4 class="w-28 text-right  font-bold">Documento:</h4>
                <p class="parrafo">2133433211</p>
            </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Nombre:</h4>
                    <p class="parrafo">Nombre de Cliente</p>
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right  font-bold">Correo:</h4>
                    <p class="parrafo">kaiserp3r3s@gmail.com</p>
                </div>

            </article>
        </a>

    </section>

</x-layout-adminz>