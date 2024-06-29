
@extends('layouts.admin')
@section('title', 'Bài viết')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Chi tiết bài viết</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{route('admin.post.index')}}">
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
                              <th scope="row">Tiêu đề bài viết</th>
                              <td>{{$post->title}}</td>
                            </tr>
                            <tr>
                              <th scope="row">Slug</th>
                              <td>{{$post->slug}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Loại</th>
                                <td> {{ $post->type }}</td>
                              </tr>
                            <tr>
                                <th scope="row">Chủ đề</th>
                                <td>{{ $post->topic->name }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Hình ảnh</th>
                                <td>
                                    <img src="{{ asset('/images/posts/' . $post->image) }}"
                                                    alt="post.jpg" style="width:200px">
                                </td>
                              </tr>

                              <tr>
                                <th scope="row">Trạng thái</th>
                                <td>
                                  @if ($post->status == 0)
                                    Chưa xuất bản
                                  @elseif ($post->status == 1)
                                    Xuất bản
                                  @endif
                                </td>
                              </tr>

                          </tbody>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <!-- Nội dung thông tin bên phải -->
                            <table class="table">
                                <tbody>

                                  <h6 class="text-bold">
                                  Mô tả
                                  </h6>
                                  <p>
                                    {{$post->description}}
                                  </p>
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
