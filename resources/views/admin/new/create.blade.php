@extends('admin.layouts.master')

@section('title')
    Thêm mới tin
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới tin</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tin</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
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
    <form action="{{ route('admin.new.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-7">
                                    <div>
                                        <label for="title" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                    <div>
                                        <label for="content" class="form-label">Nội dung</label>
                                        <textarea rows="10" class="form-control" name="content" id="content"></textarea>
                                    </div>
                                    <div>
                                        <label for="image" class="form-label">Hình ảnh</label>
                                        <input type="file"class="form-control" name="image" id="image">
                                    </div>
                                    <div>
                                        <label for="published_date" class="form-label">Ngày đăng</label>
                                        <input type="date" class="form-control" name="published_date"
                                            id="published_date">
                                    </div>
                                    <div>
                                        <label for="category_id">Loại tin</label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            <option value="">Chọn loại tin</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                            <button class="btn btn-primary" type="submit">Thêm mới</button>
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
