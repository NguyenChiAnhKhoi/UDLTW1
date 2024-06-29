@extends('layouts.admin')
@section('title')
    Bảng Topic
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tất cả chủ đề</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Bảng topic</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
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
                    <div class="col-md-3">
                      {{-- @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif --}}
                        <form action="{{ route('admin.topic.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Tên topic</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    class="form-control">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" rows="3" class="form-control">
                                {{ old('description') }}
                              </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Sắp xếp</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="0">Chọn vị trí</option>
                                    {!! $htmlsortorder !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    Thêm topic
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
                                    <th class="text-center">ID</th>
                                    <th>Tên chủ đề</th>
                                    <th>Tên slug</th>
                                    <th>Mô tả</th>
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

                                        <td>
                                            <div class="name">
                                                {{ $row->name }}
                                            </div>
                                        </td>
                                        <td> {{ $row->slug }}</td>
                                        <td> {{ $row->description }}</td>
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
                                            <a href="{{ route('admin.topic.show',$args) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.topic.edit',$args) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.topic.delete',$args) }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
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
