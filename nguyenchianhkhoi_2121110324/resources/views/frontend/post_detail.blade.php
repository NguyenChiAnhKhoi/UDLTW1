@extends('layouts.site')
@section('title', 'Chi tiết bài viết')
@section('content')

   <!-- Shop Detail Start -->
   <div class="container-fluid py-5">
    <div class="container mt-4">
        <div class="row">

          <div class="col-md-8">
            <article>
              <h1>{{$post->title}}</h1>
              <hr class="hr" />
              <h5>Được đăng vào lúc {{$post->created_at}}</h5>
              <img src="{{ asset('images/posts/'.$post->image)}}" alt="Hình ảnh bài viết" class="img-fluid">

              <p>{{$post->description}}</p>
            </article>
          </div>
          <div class="container-fluid py-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Bài viết liên quan</span></h2>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel related-carousel">
                        <div class="row">
                            @foreach ( $list_post as $postitem )
                            <div class="col-md-4">
                                <div class="card product-item border-0">
                                    <x-post-card :$postitem/>
                                </div>
                            </div>



                        @endforeach
                        </div>



                    </div>
                </div>
            </div>
        </div>
        </div>
      </div>
</div>
<!-- Shop Detail End -->






@endsection



