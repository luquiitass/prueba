<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Prube en contacto</h1>

    {{Request::input('a')}}


    <script>
        var a = {{  Request::input('a')->json() }};

        alert(a);

    </script>
</body>
</html>
