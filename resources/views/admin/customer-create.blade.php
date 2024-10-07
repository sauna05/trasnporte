<x-layout-admin
title="Registrar cliente">



        <h2 class="text-2xl font-bold mb-6 text-center">Registrar Cliente</h2>

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

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.registerCliente') }}" method="POST">
            @csrf
            
            <div class="flex justify-center items-center">
                <section class="grid grid-cols-2 items-center gap-x-5 gap-y-2">
                        
                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="document" class="font-medium text-gray-700 self-start py-1">Documento</label>
                    <input type="text" name="document" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su documento">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="name" class="font-medium text-gray-700 self-start py-1">Nombre</label>
                    <input type="text" name="name" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su nombre">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="email" class="font-medium text-gray-700 self-start py-1">Email</label>
                    <input type="email" name="email" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su email">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="password" class="font-medium text-gray-700 self-start py-1">Contraseña</label>
                    <input type="password" name="password" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su contraseña">
                </div>

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="password_confirmation" class="font-medium text-gray-700 self-start py-1">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Confirme su contraseña">
                </div>

                {{-- <div class="mb-4">
                    <label for="role_id" class="block text-sm font-medium text-gray-700">Rol</label>
                    <select name="role_id" id="" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="mb-4 flex flex-col items-center w-fit">
                    <label for="phone_number" class="font-medium text-gray-700 self-start py-1">Teléfono</label>
                    <input type="text" name="phone_number" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]" placeholder="Ingrese su teléfono">
                </div>
                </section>
            </div>
            <button type="submit" class="btn">Registrar</button>
        </form>
</x-layout-admin>
