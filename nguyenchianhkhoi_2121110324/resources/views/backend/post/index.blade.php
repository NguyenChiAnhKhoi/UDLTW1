@extends('layouts.admin')
@section('title', 'Post')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả bài viết</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{route('admin.post.create')}}">
                        <button class="btn btn-sm btn-success" >
                            <i class="fa fa-plus text-white"   aria-hidden="true"></i>
                                    Thêm
                        </button>
                    </a>
                    <a href="{{route('admin.post.trash')}}">
                        <button class="btn btn-sm btn-danger" >
                            <i class="fa fa-trash text-white"   aria-hidden="true"></i>
                                    Xem thùng rác
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:30px;">
                                            <input type="checkbox">
                                        </th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                                        <th>Tiêu đề bài viết</th>
                                        <th>Tên slug</th>
                                        <th>Loại</th>
                                        <th>Trạng thái</th>
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
                                                <div>
                                                    {{ $row->id }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <img src="{{ asset('/images/posts/' . $row->image) }}"
                                                    alt="post.jpg" style="width:80px">
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $row->title }}
                                                </div>
                                            </td>
                                            <td> {{ $row->slug }}</td>
                                            <td> {{ $row->type }}</td>
                                            @if ($row->status == 1)
                                            <td>Xuất bản</td>
                                            @else
                                            <td>Chưa xuất bản</td>
                                        @endif


                                            @php
                                                $args=['id'=>$row->id];
                                            @endphp
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-success">
                                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.post.show',$args) }}" class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.post.edit',$args) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.post.delete',$args) }}" class="btn btn-sm btn-danger">
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
