<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        @include('user.layouts.partials.header')      
    </header>
    <nav>
        @include('user.layouts.partials.nav')
    </nav>
            
    <main>
        @yield('content')
    </main>

    <footer>
        @include('user.layouts.partials.footer')   
    </footer>

   
</body>
</html>