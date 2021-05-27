<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title }}</title>
</head>
<body>
    <div class="container">
        <div class="payment-message-box" onclick="redirect()">
            <div>
                {{ $message }}
            </div>
        </div>
    </div>

    <script>
        function redirect() {
            location.href = '/'
        }

        setTimeout(() => {
            redirect()
        }, 5000)
    </script>
</body>
</html>