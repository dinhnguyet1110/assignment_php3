
@extends('user.layouts.app')

@section('title')
    Tin tức
@endsection
@section('content') 
    <section class="section pb-0">
        <div class="container">
            <h2>Tất cả tin tức</h2>
            <div class="row">
                @foreach ($news as $item)
                    <div class="col-lg-4 mb-5">
                        <article class="card">
                            <div class="post-slider slider-sm">
                                <img src="{{ $item->image }}" class="card-img fixed-size-img" alt="{{ $item->title }}" class="card-img-top"
                                    alt="post-thumb" >
                            </div>

                            <div class="card-body">
                                <h3 class="h4 mb-3"><a class="post-title" href="">{{ $item->title }}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="" class="card-meta-author">
                                            <span>Admin</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i> {{ $item->published_date }}
                                    </li>
                                </ul>
                                <p>{{ Str::limit($item->content, 150) }}</p>
                                <a href="{{ route('show-ct', $item->id) }}" class="btn btn-outline-primary">Đọc thêm</a>
                            </div>
                        </article>
                    </div>
                @endforeach

                <div class="col-12">
                    <div class="border-bottom border-default"></div>
                </div>
                
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="pagination justify-content-center">
                            {{ $news->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-sm">
        <div class="container">
            <h2>Tin nổi bật</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    @foreach ($hotNews as $item)
                    <article class="card mb-4">
                        <div class="row card-body">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="">
                                    <img src="{{ $item->image }}" class="card-img fixed-size-img" alt="{{ $item->title }}" class="card-img-top"
                                    alt="post-thumb" >
    
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h3 class="h4 mb-3"><a class="post-title" href="">{{ $item->title }}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="" class="card-meta-author">
                                            <span>Admin</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i> {{ $item->published_date }}
                                    </li>
                                </ul>
                                <p>{{ Str::limit($item->content, 150) }}</p>
                                <a href="{{ route('show-ct', $item->id) }}" class="btn btn-outline-primary">Đọc thêm</a>
                            </div>
                        </div>
                    </article>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    
@endsection
