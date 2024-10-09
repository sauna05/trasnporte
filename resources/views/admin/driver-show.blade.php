<x-layout-admin title="Conductor">

    {{-- Cada article es un registro --}}
    <section class="flex space-x-20">
        @if($driver->imagen)

          <img src="{{ asset('storage/' . $driver->imagen) }}" class="w-96" alt="Conductor">     
        @else        
          <img src="{{ asset('images/customers/Donna-sorridente-830x625.webp') }}" class="w-96" alt="Conductor">
        @endif
        <article class="space-y-5">
            <article class="space-y-5 self-center items-center">
                <h1 class="text-2xl font-bold mb-5">{{$driver->user->name}}</h1>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right font-bold">Licencia:</h4>
                    <p class="parrafo">{{ $driver->licence->name }}</p> <!-- Mostrar el tipo de licencia -->
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right font-bold">Experiencia:</h4>
                    <p class="parrafo">{{ $driver->experience }} {{ $driver->experience === 1 ? 'año' : 'años' }}</p> <!-- Mostrar la experiencia -->
                </div>

                <div class="flex space-x-5">
                    <h4 class="w-28 text-right font-bold">Disponibilidad:</h4>
                    <p class="parrafo">{{$driver->availability}}</p> <!-- Mostrar disponibilidad -->
                </div>
            </article>
        </article>

        {{-- En caso de que el camión se encuentre en ruta --}}
        <div class="space-y-5 items-center ">
            <h1 class="text-2xl font-bold mb-5">Rendimiento</h1>

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold">Entregas totales:</h4>
                <p class="parrafo">7</p> <!-- Mostrar el total de entregas -->
            </div>

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold">Entregas a tiempo:</h4>
                <p class="parrafo">4</p> <!-- Mostrar entregas a tiempo -->
            </div>

            <div class="flex space-x-5">
                <h4 class="w-28 text-right font-bold">Accidentes:</h4>
                <p class="parrafo">0</p> <!-- Mostrar número de accidentes -->
            </div>

            <div class="flex space-x-5 items-center">
                <h4 class="w-28 text-right font-bold">Puntuación:</h4>
                
                {{-- ESTRELLAS --}}
                <div class="flex">
                    @for ($i = 0; $i < 3; $i++)
                        <img src="{{ asset('images/icons/estrella.svg') }}" alt="Estrella" />
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="flex flex-col space-y-1 justify-center items-center">
            <p>Ver ruta Asignada</p>
            <a href="#" class="btn flex justify-center items-center">Ruta</a> <!-- Asegúrate de que esta ruta esté definida -->
        </div>
    </section>

</x-layout-admin>