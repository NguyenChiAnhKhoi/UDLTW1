
@extends('layouts.admin')
@section('title', 'menu')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Chi tiết Menu</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{route('admin.menu.index')}}">
                        <button class="btn btn-sm btn-primary" >
                                    Quay về danh sách
                        </button>
                    </a>

                </div>



                <div class="container">

                    <div class="row">
                      <div class="col-md-6">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th scope="row">Tên Menu</th>
                              <td>{{$menu->name}}</td>
                            </tr>
                            <tr>
                              <th scope="row">Đường dẫn</th>
                              <td>{{$menu->link}}</td>
                            </tr>
                            <tr>
                                <th scope="row"> Menu cha</th>
                                <td>
                                    @if ($menu->parent)
                                        {{ $menu->parent->name }}
                                    @else
                                        Không có menu cha
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Loại</th>
                                <td>{{$menu->type}}</td>
                              </tr>
                              <tr>
                                <th scope="row">Vị trí</th>
                                <td>{{$menu->position}}</td>
                              </tr>
                              <tr>
                                <th scope="row">Table ID</th>
                                <td>{{$menu->table_id}}</td>
                              </tr>
                              <tr>
                                <th scope="row">Trạng thái</th>
                                <td>
                                  @if ($menu->status == 0)
                                    Chưa xuất bản
                                  @elseif ($menu->status == 1)
                                    Xuất bản
                                  @endif
                                </td>
                              </tr>

                          </tbody>
                        </table>
                      </div>

                    </div>
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
