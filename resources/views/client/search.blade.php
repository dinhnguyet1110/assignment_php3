@extends('client.layouts.app')
@section('title')
    Tin tức: {{ $query }}
@endsection

@section('content')
    <section class="section pb-0">
        <div class="container">
            <h3>Kết quả tìm kiếm cho: "{{ $query }}"</h3>

            @if ($news->isNotEmpty())
                <h2>Tin tức:</h2>
                @foreach ($news as $news)
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ $news->image }}" class="card-img" alt="{{ $news->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $news->title }}</h5>
                                    <p class="card-text"><small class="text-muted">Ngày đăng:
                                            {{ $news->published_date }}</small></p>
                                    <p class="card-text">{{ Str::limit($news->content, 150) }}</p>
                                    <a href="{{ route('show-ct', $news->id) }}" class="btn btn-primary">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2></h2>
            @endif

            @if ($category->isNotEmpty())
                <h2>Loại tin:</h2>
                <ul>
                    @foreach ($category as $category)
                        <li><a href="{{ route('show-loai', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            @else
                <h2></h2>
            @endif
        </div>
    </section>

@endsection
