@extends('layouts.admin')
@section('title', 'User')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả User</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{route('admin.topic.trash')}}">
                        <button class="btn btn-sm btn-danger" >
                            <i class="fa fa-trash text-white"   aria-hidden="true"></i>
                                    Xem thùng rác
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                     <div class="col-md-4">
                        <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label>Tên User (*)</label>
                                <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                    class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>User name (*)</label>
                                <textarea rows="1" name="username" id="username" placeholder="Nhập username" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>password (*)</label>
                                <input type="password" name="password" id="password" placeholder="Nhập password" class="form-control"></input>
                            </div>
                            <div class="mb-3">
                                <label>Giới tính</label>
                                <select name="gender" class="form-control">
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Số điện thoại (*)</label>
                                <input type="number" name="phone" id="phone" placeholder="Số điện thoại" class="form-control"></input>
                            </div>
                            <div class="mb-3">
                                <label>Email (*)</label>
                                <textarea rows="1" name="email" id="email" placeholder="Nhập email  " class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Vai trò</label>
                                <select name="roles" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Địa chỉ (*)</label>
                                <textarea rows="1" name="address" id="address" placeholder="Nhập địa chỉ" class="form-control"></textarea>
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
                                           <div class="col-md-8">
                            <table class="table table-bordered">
            <thead>
                                    <tr>
                                        <th class="text-center" style="width:30px;">
                                            <input type="checkbox">
                                        </th>
                                        <th class="text-center" style="width:30px;">
                                            Image
                                        </th>
                                        <th>Tên người dùng</th>
                                        <th>Số điện thoại</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $row)
                                        <tr class="datarow">
                                        <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>
                                            <img src="{{asset('images/users/'.$row->image)}}" style="width:300px" alt="{{ $row->image }}">
                                            </td>


                                            <td>
                                                <div class="name">
                                                    {{ $row->name }}
                                                </div>
                                            </td>
                                            <td> {{ $row->phone }}</td>
                                            <td>
                                            @php
                                                    $agrs=['id' => $row->id]
                                                @endphp
                                                <div class="function_style">
                                                    <a href="{{ route('admin.user.show', $agrs)}}" class="bg-success">
                                                        <i class="fa fa-solid fa-eye "></i>
                                                    </a>
                                                    {{-- <a >
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    </a> --}}
                                                    <a class="bg-primary" href="{{ route('admin.user.edit', $agrs)}}">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="bg-danger" href="{{ route('admin.user.delete', $agrs)}}">
                                                        <i class="fa fa-solid fa-trash "></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
