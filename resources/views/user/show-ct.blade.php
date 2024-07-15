@extends('user.layouts.app')
@section('title')
    {{ $news->title }}
@endsection

@section('content')
    <section class="section pb-0">
        <div class="container">
            <h1 class="card-title mt-3 mb-3">{{ $news->title }}</h1>
            <div class="card mb-3">
                <img src="{{ $news->image }}" class="card-img-top" alt="{{ $news->title }}">
                <div class="card-body">
                    <p class="card-text">{{ $news->content }}</p>
                    <p class="card-text"><small class="text-muted">Ngày đăng: {{ $news->published_date }}</small></p>
                    <p class="card-text"><small class="text-muted">Lượt xem: {{ $news->views }}</small></p>
                </div>
            </div>
            <a href="{{ route('news') }}"><em>Quay lại</em></a>

            <!-- Form bình luận -->
            @auth
                <div class="mt-4">
                    <h3>Viết bình luận</h3>
                    <form action="{{ route('comment', $news->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Bình luận:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Gửi</button>
                    </form>
                </div>
            @endauth

            @guest
                <p class="mt-4">Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để bình luận.</p>
            @endguest

            <!-- Hiển thị bình luận -->
            <div class="mt-4">
                <h3>Bình luận</h3>
                @foreach ($news->comments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comment->user->name }}</h5>
                            <p class="card-text">{{ $comment->comment }}</p>
                            <p class="card-text"><small
                                    class="text-muted">{{ $comment->created_at->format('d/m/Y H:i') }}</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
