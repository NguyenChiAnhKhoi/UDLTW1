@extends('layouts.site')
@section('title', 'Tất cả sản phẩm')
@section('header')
<link rel="stylesheet" href="product.css">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
@endsection
@section('content')
<div class="container-fluid pt-5">

    <div class="container">
        <h1 class="mb-4 text-center">Tat ca bai viet</h1>
        <div class="row">
            @foreach($list_post as $postitem)
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Content of your post card -->
                            {{-- <h5 class="card-title">{{ $postitem->title }}</h5>
                            <p class="card-text">{{ $postitem->content }}</p> --}}
                            <x-post-card :$postitem/>
                            <!-- Additional content or styling for the post card -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                      <ul class="pagination justify-content-center mb-3">
                        {{-- <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li> --}}
                        <li>
                            {{ $list_post->links() }}
                        </li>
                      </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
@endsection
