<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="Stylesheet" href="/css/base.css">
    <link rel="Stylesheet" href="/css/basicuser.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="login-page">
        <div class="login-center-container">
            <img src="assets/cat database logo.jpg" class="login-image">
            <form class="login-form-container" method="POST" action="{{route("login.post")}}">
                @csrf
                @if($errors->Any())
                    @foreach($errors->all() as $error)
                        <p class="error-return">{{$error}}</p>
                    @endforeach
                @endif

                <input class="login-form-email-input" placeholder="Email" type="email" name="email"/>
                <input class="login-form-password-input" placeholder="Password" type="password" name="password">
                <a href="{{route("forgotPassword.index")}}" class="login-form-forgotpassword-link">Forgot Password?</a>
                <input class="login-form-submit-input" type="submit" value="Log In"/>
                <a href="{{route("register.index")}}" class="login-create-account-link">Create a new account</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
