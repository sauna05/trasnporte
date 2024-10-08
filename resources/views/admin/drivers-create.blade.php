<x-layout-admin title="Registrar Conductor">
    <h2 class="text-2xl font-bold mb-6 text-center">Registrar Conductor</h2>

    <!-- Mostrar Mensajes de Éxito o Error -->
    @if ($errors->any())
        <div class="mb-4">
            <ul class="text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('message'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.registerDriver') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Asegúrate de incluir este token CSRF para la seguridad -->

        <div class="flex justify-center items-center">
            <section class="grid grid-cols-2 items-center gap-x-5 gap-y-2">

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="document" class="font-medium text-gray-700 self-start py-1">Número de Documento</label>
                    <input type="text" name="document" id="document" value="{{ old('document') }}" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su documento">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="name" class="text-gray-700 self-start py-1">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su nombre">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="email" class="text-gray-700 self-start py-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su email">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="password" class="text-gray-700 self-start py-1">Contraseña</label>
                    <input type="password" name="password" id="password" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su contraseña">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="password_confirmation" class="font-medium text-gray-700 self-start py-1">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Confirme su contraseña">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="license" class="font-medium text-gray-700 self-start py-1">Licencia</label>
                    <input type="text" name="license" id="license" value="{{ old('license') }}" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su licencia">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="experience" class="font-medium text-gray-700 self-start py-1">Experiencia (en años)</label>
                    <input type="number" name="experience" id="experience" value="{{ old('experience') }}" required min="1" class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="imagen" class="font-medium text-gray-700 self-start py-1">Imagen</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*"  class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]">
                </div>

            </section>
        </div>

        <button type ="submit "class="btn">Registrar</button>
    </form>  
</x-layout-admin> 