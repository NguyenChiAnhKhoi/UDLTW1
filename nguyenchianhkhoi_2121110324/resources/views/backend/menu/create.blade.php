@extends('layouts.admin')
@section('title', 'Menu')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 row">
                        <h1 class="d-inline col-md-10">Thêm menu</h1>

                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('admin.menu.index') }}">
                        <button class="btn btn-sm btn-primary">
                            Quay về danh sách
                        </button>
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <form action="{{ route('admin.menu.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label>Tên Menu (*)</label>
                                    <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                        class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Menu cha (*)</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="0">None</option>
                                        {!! $htmlparentId !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Link (*)</label>
                                    <textarea rows="3" name="link" id="link" placeholder="Nhập link" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="type">Loại</label>
                                    <select name="type" id="type" class="form-control">
                                    <option value="category">Danh mục</option>
                                    <option value="brand">Thương hiệu</option>
                                    <option value="topic">Chủ đề</option>
                                    <option value="page">Trang</option>
                                    <option value="post">Bài viết</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Table Id (*)</label>
                                    <input type="number" name="table_id" id="table_id" placeholder="table id"
                                        class="form-control"></textarea>
                                </div>
                                <!-- <div class="mb-3">
                                    <label>Hình đại diện</label>
                                    <input type="file" name="image" class="form-control">
                                </div> -->
                                <div class="mb-3">
                                    <label>Sắp xếp</label>
                                    <select name="sort_order" class="form-control">
                                        <option value="0">Chọn vị trí</option>
                                        {!! $htmlsortOrder !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Vị trí</label>
                                    <select name="position" class="form-control">
                                        <option value="mainmenu">Main menu</option>
                                        <option value="footermenu">Footer menu</option>
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

