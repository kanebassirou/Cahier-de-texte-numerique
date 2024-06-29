<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('titre')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
</head>

<body>

    <div class="container">
        @yield('content')   
    </div>
  
</body>
</html>