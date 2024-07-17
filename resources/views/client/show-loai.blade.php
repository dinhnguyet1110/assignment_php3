@extends('client.layouts.app')
@section('title')
    Tin tức trong {{ $category->name }}
@endsection
@section('content')
    <section class="section pb-0">
        <div class="container">
            <h3>Tin tức trong: {{ $category->name }}</h3>

            @foreach ($news as $item)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ $item->image }}" class="card-img" alt="{{ $item->title }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ Str::limit($item->content, 150) }}</p>
                                <p class="card-text"><small class="text-muted">Ngày đăng:
                                        {{ $item->published_date }}</small></p>
                                <p class="card-text"><small class="text-muted">Lượt xem: {{ $item->views }}</small></p>
                                <a href="{{ route('show-ct', $item->id) }}" class="btn btn-primary">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
