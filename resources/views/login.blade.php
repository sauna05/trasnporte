<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-fondo-0 min-h-full">
    <img src="{{ asset('images/icons/logo.svg') }}" alt="" class="mx-auto my-5">

    <form action="{{ route('login') }}" method="POST" class="bg-azul-principal-0 w-96 h-[26rem] flex flex-col mx-auto rounded-lg space-y-5 justify-center text-fondo-0 items-start px-10">
        @csrf

        {{-- Mostrar errores de validación --}}
        @if ($errors->any())
            <div class="bg-red-500 text-white p-2 rounded-md w-full mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex flex-col space-y-2 w-full">
            <label for="email">Email</label>
            <input type="email" name="email" class="h-8 outline-none rounded-md text-gray-800 px-2" value="{{ old('email') }}">
        </div>
        
        <div class="flex flex-col space-y-2 w-full">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="h-8 outline-none rounded-md text-gray-800 px-2">
        </div>
              
        <div class="pt-1 flex items-center space-x-5">
            <label for="show-password">Mostrar contraseña</label>
            <input type="checkbox" id="show-password" class="scale-125">
        </div>

        <button class="bg-naranja-0 w-full h-10 rounded-md"> 
            Empezar
         </button>
    </form>

    <script>
        document.getElementById('show-password').addEventListener('change', function() {
            var passwordInput = document.getElementById('password');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
</body>
</html>