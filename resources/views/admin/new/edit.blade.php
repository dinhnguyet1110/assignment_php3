@extends('admin.layouts.master')

@section('title')
    Cập nhật tin
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"> Cập nhật tin</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tin</a></li>
                        <li class="breadcrumb-item active"> Cập nhật</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.new.update', $model->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-8">
                                    <div>
                                        <label for="title" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ $model->title }}">
                                    </div>
                                    <div>
                                        <label for="content" class="form-label">Nội dung</label>
                                        <textarea rows="10" class="form-control" name="content" id="content">{{ $model->content }}</textarea>
                                    </div>
                                    <div>
                                        <label for="image" class="form-label">Hình ảnh</label>
                                        @if ($model->image)
                                            <div>
                                                <img src="{{ asset('storage/' . $model->image) }}" width="100px"
                                                    height="100px" alt="Current Image">
                                            </div>
                                        @endif
                                        <input type="file" class="form-control" name="image" id="image">
                                        <small class="form-text text-muted">Chọn tệp mới</small>
                                    </div>
                                    <div>
                                        <label for="published_date" class="form-label">Ngày đăng</label>
                                        <input type="text" class="form-control" name="published_date" id="published_date"
                                            value="{{ $model->published_date }}">
                                    </div>
                                    <div>
                                        <label for="category_id">Category</label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $model->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <button class="btn btn-primary" type="submit">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>


@endsection
