<x-layout-admin
title="Registrar Vehiculo">

<h1 class="text-2xl font-bold mb-5">Registrar Vehiculo</h1>

<form  method="POST" action="{{route('register_vehicle')}}" enctype="multipart/form-data">
    @csrf
    
    <article class="flex justify-center items-center space-x-28">
        <section class="flex flex-col space-y-4">

            <div class="flex flex-col items-start space-y-2">
                <label for="tipo" class="pl-2">Tipo *</label>
                <input type="text" id="type" name="type" required class=" py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]">
            </div>

            <div class="flex flex-col items-start space-y-2">
                <label for="capacidad" class="pl-2">Capacidad (Kilogramos) *</label>
                <input type="number"   name="capacity" type="text" id="capacity" required  class=" py-2 px-3  border-2 border-black rounded-md focus:outline-none w-[25rem]">
            </div>
        </section>

        <section>
            <div class="flex flex-col">
                <label for="foto" class="my-1">Foto</label>

                <div class="flex justify-center items-center flex-col">
                    <img src="{{asset('images\camion-por-defecto.png')}}" class="w-36" alt="">
                    <input type="file" name="foto" id="foto" class="w-fit">
                </div>
            </div>
        </section>
    </article>
    <button class="btn my-12">
        Registrar
    </button>
</form>

</x-layout-admin>