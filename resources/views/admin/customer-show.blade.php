<x-layout-admin
title="Cliente">


   {{-- cada article es un registro --}}
   <section class="flex space-x-20 items-center">
        
        <img src="{{asset('images\customers\cliente-1.jfif')}}" class="w-96 h-80" alt="">

       
        <article class="space-y-5 ">

            <h1 class="text-2xl font-bold mb-5">Nombre Cliente</h1>


            <div class="flex space-x-5">
                <h4 class="w-28 text-right  font-bold">Documento:</h4>
                <p class="parrafo">123123123</p>
            </div>  

            <div class="flex space-x-5">
                <h4 class="w-28 text-right  font-bold">Correo:</h4>
                <p class="parrafo">kaiserp3r3s@gmail.com</p>
            </div>  

        

        </article>

        {{-- En caso de que el camión se encuentre en ruta --}}
        <div class="flex flex-col  items-center ">
            <h1 class="text-2xl font-bold mb-5 ">Pedidos</h1>
            <a href="#" class="btn flex justify-center items-center">Ver Pedidos Asignados</a>
        </div>
        
            
</section>





</section>



</x-layout-admin>