@extends('layouts.admin')
@section('title', 'Menu')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bảng menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Bảng menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        {{-- <a href="#" class="btn btn-sm btn-success">
              <i class="fa fa-plus" aria-hidden="true"></i>Thêm
            </a> --}}
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            @php
                        $args = ['id' => $menu->id];
                    @endphp
                    <div class="row">
                     <div class="col-md-4">
                        <form action="{{ route('admin.menu.update', $args) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Tên Menu (*)</label>
                                <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                    class="form-control" value="{{ old('name',$menu->name) }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Menu cha (*)</label>
                                <select name="parent_id" class="form-control">
                                    <option value="{{ old('parent_id',$menu->parent_id) }}">None</option>
                                    {!! $htmlparentId !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Link (*)</label>
                                <textarea rows="3" name="link" id="link" placeholder="Nhập link" class="form-control">{{ old('link',$menu->link) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Loại</label>
                                <select name="type" class="form-control">
                                    <option value="category" {{($menu->type=='category')?'selected':''}}>Danh mục</option>
                                    <option value="brand" {{($menu->type=='brand')?'selected':''}}>Thương hiệu</option>
                                    <option value="topic" {{($menu->type=='topic')?'selected':''}}>Chủ đề</option>
                                    <option value="page" {{($menu->type=='page')?'selected':''}}>Trang</option>
                                    <option value="post" {{($menu->type=='post')?'selected':''}}>Bài viết</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Table Id (*)</label>
                                <input type="number"  value="{{ old('table_id',$menu->table_id) }}" name="table_id" id="table_id" placeholder="table id" class="form-control"></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" class="form-control">
                            </div> -->
                            <div class="mb-3">
                                <label>Sắp xếp</label>
                                <select name="sort_order" class="form-control">
                                    <option value="0">Chọn vị trí</option>
                                    {!! $htmlsortOrder!!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Vị trí</label>
                                <select name="position" class="form-control">
                                    <option value="mainmenu" {{($menu->position=='mainmenu')?'selected':''}}>Main menu</option>
                                    <option value="footermenu" {{($menu->position=='footermenu')?'selected':''}}>Footer menu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="0" {{($menu->status==0)?'selected':''}}>Chưa xuất bản</option>
                                    <option value="1" {{($menu->status==1)?'selected':''}}>Xuất bản</option>
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
@endsection
