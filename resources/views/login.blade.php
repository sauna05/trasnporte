<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <label for="">email</label>
        <input type="email" name="email" >
        <label for="">password</label>
        <input type="password" id="password" name="password">
        <input type="checkbox" id="show-password">
        <button>
            Empezar
         </button>
    </form>
   
</body>
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
</html>