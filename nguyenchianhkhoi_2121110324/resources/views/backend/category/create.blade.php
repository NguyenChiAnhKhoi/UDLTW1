@extends('layouts.admin')
@section('title', 'Category')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 row">
                        <h1 class="d-inline col-md-10">Thêm danh mục</h1>

                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('admin.category.index') }}">
                        <button class="btn btn-sm btn-primary">
                            Quay về danh sách
                        </button>
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <form action="{{ route('admin.category.store') }}" enctype="multipart/form-data" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label>Tên danh mục (*)</label>
                                    <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                        class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Danh mục cha (*)</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="0">None</option>
                                        {!! $htmlparentId !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Mô tả (*)</label>
                                    <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả danh mục" class="form-control" value="{{ old('description') }}"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Hình đại diện</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Sắp xếp</label>
                                    <select name="sort_order" class="form-control">
                                        <option value="0">Chọn vị trí</option>
                                        {!! $htmlsortOrder !!}
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

