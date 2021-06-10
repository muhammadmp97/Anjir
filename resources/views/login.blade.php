<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h1 class="vazir fs-19 bolder text-center">ورود به پنل مدیریت</h1>
            <br>
            <form action="{{ url('/login') }}" method="post">
                @csrf
                <input name="username" type="text" placeholder="Username" class="d-block w-100" style="margin-bottom: 10px;">
                <input name="password" type="password" placeholder="Password" class="d-block w-100" style="margin-bottom: 10px;">
                <input type="submit" class="b-button b-button-red d-block w-100" value="ورود">
            </form>

            @error('error')
                <p class="vazir pb-0">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <script src="js/app.js"></script>
</body>
</html>