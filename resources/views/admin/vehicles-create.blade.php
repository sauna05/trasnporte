<x-layout-admin title="Registrar Vehiculo">

    <h1 class="text-2xl font-bold mb-5">Registrar Vehiculo</h1>

    @if ($errors->any())
        <div class="mb-4">
            <div class="text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if (session('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register_vehicle') }}" enctype="multipart/form-data">
        @csrf
        
        <article class="flex justify-center items-center space-x-28">
            <section class="flex flex-col space-y-4">

                <div class="flex flex-col items-start space-y-2">
                    <label for="type" class="pl-2">Tipo *</label>
                    <input type="text" id="type" name="type" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]">
                </div>

                <div class="flex flex-col items-start space-y-2">
                    <label for="capacity" class="pl-2">Capacidad (Kilogramos) *</label>
                    <input type="number" name="capacity" id="capacity" required class="py-2 px-3 border-2 border-black rounded-md focus:outline-none w-[25rem]">
                </div>
            </section>

            <section>
                <div class="flex flex-col">
                    <label for="imagen" class="my-1">Foto</label>

                    <div class="flex justify-center items-center flex-col">
                        <!-- Imagen por defecto -->
                        <img id="imagePreview" src="{{ asset('images/camion-por-defecto.png') }}" class="w-36 mb-2" alt="">
                        <!-- Input para cargar la imagen -->
                        <input type="file" name="imagen" accept="image/*" id="imagen" class="w-fit" onchange="previewImage(event)">
                    </div>
                </div>
            </section>
        </article>

        <button type="submit" class="btn my-12">
            Registrar
        </button>
    </form>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = "{{ asset('images/camion-por-defecto.png') }}"; // Reset to default image
            }
        }
    </script>

</x-layout-admin>