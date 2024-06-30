@extends('layouts.admin')
@section('title', 'Post')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 row">
                        <h1 class="d-inline col-md-10">Thêm post</h1>

                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('admin.post.index') }}">
                        <button class="btn btn-sm btn-primary">
                            Quay về danh sách
                        </button>
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <form action="{{ route('admin.post.store') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label>Tên bài viết (*)</label>
                                    <input type="text" name="title" id="title" placeholder="Nhập tiêu đề"
                                        class="form-control" value="{{ old('title') }}">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Topic (*)</label>
                                    <select name="topic_id" class="form-control">
                                        <option value="">Chọn Topic</option>
                                        @foreach ($topics as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Chi tiết (*)</label>
                                    <textarea rows="3" name="detail" id="detail" placeholder="Nhập chi tiết bài viết" class="form-control"></textarea>
                                </div>
                                {{-- <div class="mb-3">
                                    <label>Slug (*)</label>
                                    <textarea rows="3" name="slug" id="slug" placeholder="Nhập mô tả danh mục" class="form-control"></textarea>
                                </div> --}}
                                <div class="mb-3">
                                    <label>Hình đại diện</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Mô tả (*)</label>
                                    <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả bài viết" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Định dạng</label>
                                    <select name="type" class="form-control">
                                        <option value="page">Trang</option>
                                        <option value="post">Bài</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Xuất bản</option>
                                        <option value="0">Chưa xuất bản</option>
                                    </select>
                                </div>
                                <div class="card-header text-right">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fa fa-save" aria-hidden="true"></i>
                                        Lưu
                                    </button>
                                </div>
                            </form>
                        </div>

                </div>
            </div>
        </section>
    </div>

@endsection

