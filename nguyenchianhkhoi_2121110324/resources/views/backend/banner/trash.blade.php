
@extends('layouts.admin')
@section('title', 'banner')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Thương hiệu trong thùng rác   </h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
<a href="{{route('admin.banner.index')}}">
    <button class="btn btn-sm btn-primary" >
                Quay về danh sách
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
                                        <th class="text-center" >ID</th>
                                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                                        <th>Tên danh mục</th>
                                        <th>Tên slug</th>
                                        <th>Danh mục cha</th>
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
                                                {{ $row->id }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('/images/banner/' . $row->image) }}"
                                                    alt="banner.jpg" style="width:80px">
                                            </td>
                                            <td>
                                                <div class="name">
                                                    {{ $row->name }}
                                                </div>
                                            </td>
                                            <td> {{ $row->slug }}</td>
                                            <td>
                                                @if ($row->parent)
                                                    {{ $row->parent->name }}
                                                @else
                                                    Không có danh mục cha
                                                @endif
                                            </td>
                                            @php
                                        $args=['id'=>$row->id];
                                        @endphp
                                            <td>
                                                <a href="{{ route('admin.banner.restore',$args) }}" class="btn btn-sm btn-success">
                                                    <i class="fa fa-undo-alt" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.banner.show',$args) }}" class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.banner.destroy',$args) }}" class="btn btn-sm btn-danger">
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
