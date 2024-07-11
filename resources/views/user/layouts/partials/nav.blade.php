<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Trang chủ</a>
        <a class="navbar-brand" href="{{ route('news') }}">Tin tức</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('show-loai', $category->id) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
            <form class="d-flex" action="{{ route('search') }}" method="GET">
                <input class="form-control-lg me-2" type="search" placeholder="Tìm kiếm" name="query" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>
</nav>