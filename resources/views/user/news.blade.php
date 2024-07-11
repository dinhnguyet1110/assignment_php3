@extends('user.layouts.app')

@section('content')
    <div class="container">
        <h1>Tin tức</h1>
        @foreach ($news as $item)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ $item->image }}" class="card-img" alt="{{ $item->title }}" width="200px" height="200px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text"><small class="text-muted">Ngày đăng: {{ $item->published_date }}</small></p>
                            <p class="card-text">{{ Str::limit($item->content, 150) }}</p>
                            <a href="{{ route('show-ct', $item->id) }}" class="btn btn-primary">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
