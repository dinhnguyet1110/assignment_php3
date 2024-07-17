<nav class="container navbar navbar-expand-lg navbar-white">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img class="img-fluid" width="100px" src="{{ asset('theme/client/images/logo.png') }}"
            alt="Reader | Hugo Personal Blog Template">
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
            <li  class="nav-item"><a class="nav-link" href="{{ route('news') }}">Tin tức</a></li>
            
            @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show-loai', $category->id) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="order-2 order-lg-3 d-flex align-items-center">
        <form class="search-bar" action="{{ route('search') }}" method="GET">
            <input  type="search" placeholder="Tìm kiếm ..." name="query" aria-label="Search">
        </form>
    </div>
</nav>
