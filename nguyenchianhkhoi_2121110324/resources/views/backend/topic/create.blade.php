@extends('layouts.admin')
@section('title', 'topic')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 row">
                        <h1 class="d-inline col-md-10">Thêm chủ đề</h1>

                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('admin.topic.index') }}">
                        <button class="btn btn-sm btn-primary">
                            Quay về danh sách
                        </button>
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
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
                </div>
            </div>
        </section>
    </div>

@endsection

