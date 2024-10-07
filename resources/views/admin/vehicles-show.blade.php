<x-layout-admin
title="Vehiculo">


   {{-- cada article es un registro --}}
   <section class="flex space-x-20 ">
        
        <img src="{{asset('images/trucks/camion1.png')}}" class="w-96" alt="">

       
        <article class="space-y-5 ">

            <h1 class="text-2xl font-bold mb-5">Nombre Vehiculo</h1>


            <div class="flex space-x-5">
                <h4 class="w-28 text-right  font-bold">Capacidad:</h4>
                <p class="parrafo">12000 k</p>
            </div>

            <div class="flex space-x-5">
                <h4 class="w-28 text-right  font-bold">Estado:</h4>
                <p class="parrafo">Disponible</p>
            </div>  

            <div class="flex space-x-5 ">
                <h4 class="w-28 text-right  font-bold">Mantenimiento:</h4>
                
                <form action="#" class="space-y-5">
                    <section class="flex space-x-10">
                        <div class="flex space-x-4">
                            <input type="radio"  name="si-no" id="yes" class="scale-150">
                            <label for="yes">Yes</label>
                        </div>
                        <div class="flex space-x-4">
                            <input type="radio" name="si-no" id="no" class="scale-150">
                            <label for="no">No</label>
                        </div>
                    </section>

                    <section class="flex flex-col justify-start items-end space-y-5">
                        <div class="flex space-x-10 items-center">
                            <h4 class=" text-right  font-bold">Since:</h4>
                            <input type="date" name="" id="" class=" border-2 rounded-md px-7 py-2">
                       </div>

                        <div class="flex space-x-10 items-center">
                            <h4 class=" text-right  font-bold">Till:</h4>
                            <input type="date" name="" id="" class=" border-2 rounded-md px-7 py-2">
                        </div>

                        <button class="btn self-start">
                            Iniciar Mantenimiento
                        </button>

                    </section>

                </form>
            </div>  

        </article>

        {{-- En caso de que el camión se encuentre en ruta --}}
        <div class="flex flex-col  items-center ">
            <h1 class="text-2xl font-bold mb-5 ">Ruta Actual</h1>
            <a href="#" class="btn flex justify-center items-center">Ver Ruta Asignada</a>
        </div>
        
            
</section>





</section>



</x-layout-admin>
