<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />
    @include('user.layouts.partials.css')   
</head>


<!DOCTYPE html>
<html lang="en-us">

<body>
    
    <header class="navigation fixed-top">
        <div class="container mb-16">
            @include('user.layouts.partials.nav')
        </div>
    </header>
   

   

    <main>
        @yield('content')
    </main>

    <footer  class="footer">
        @include('user.layouts.partials.footer')   
    </footer>

    @include('user.layouts.partials.js')   
  
</body>

</html>
