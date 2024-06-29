
@extends('layouts.admin')
@section('title', 'Product')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả sản Phẩm</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
<a href="{{route('admin.product.trash')}}">
    <button class="btn btn-sm btn-danger" >
        <i class="fa fa-trash text-white"   aria-hidden="true"></i>
                Xem thùng rác
    </button>
</a>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <form action="{{ route('admin.product.store') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label>Tên sản phẩm (*)</label>
                                    <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                        class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Danh mục  (*)</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Chi tiết (*)</label>
                                    <textarea rows="3" name="detail" id="detail" placeholder="Nhập chi tiết sản phẩm" class="form-control"></textarea>
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
                                    <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả danh mục" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Giá tiền (*)</label>
                                    <input type="number" name="price" id="price" placeholder="Nhập giá tiền"
                                        class="form-control"></input>
                                </div>
                                <div class="mb-3">
                                    <label>Giá sau khi được giảm (*)</label>
                                    <input type="number" name="pricesale" id="pricesale" placeholder="Nhập giá tiền"
                                        class="form-control"></input>
                                </div>
                                {{-- <div class="mb-3">
                                    <label>Hình đại diện</label>
                                    <input type="file" name="image" class="form-control">
                                </div> --}}
                                <div class="mb-3">
                                    <label>Thương hiệu (*)</label>
                                    <select name="brand_id" class="form-control">
                                        <option value="">Chọn thương hiệu</option>
                                        @foreach ($brands as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Xuất bản</option>
                                        <option value="2">Chưa xuất bản</option>
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
                        <div class="col-md-9">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:30px;">
                                            <input type="checkbox">
                                        </th>
                                        <th class="text-center" >ID</th>
                                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Tên slug</th>
                                        <th>Giá</th>
                                        <th>Giá khuyến mãi</th>
                                        <th class="text-center" style="width:190px;">Chức năng</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $row)
                                        <tr class="datarow">
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>
                                                {{$row->id}}
                                            </td>
                                            <td>
                                                <img src="{{ asset('/images/products/' . $row->image) }}"
                                                    alt="category.jpg" style="width:80px">
                                            </td>
                                            <td>
                                                <div class="name">
                                                    {{ $row->name }}
                                                </div>
                                            </td>
                                            <td> {{ $row->slug }}</td>
                                            <td> {{ $row->price }}</td>
                                            <td> {{ $row->pricesale  }}</td>
                                            @php
                                            $args=['id'=>$row->id];
                                        @endphp
                                            <td>
                                                <a href="#" class="btn btn-sm btn-success">
                                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.product.show',$args) }}" class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.product.edit',$args) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.product.delete',$args) }}" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        </section>
    </div>

@endsection



@section('header')
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection
@section('footer')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
@endsection
