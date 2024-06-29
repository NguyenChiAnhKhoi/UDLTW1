<div class="card">
    <img src="{{ asset('images/posts/'.$post->image)}}" class="card-img-top" alt="Post Image">
    <div class="card-body">
        <h5 class="card-title"><a href="{{route('site.post.detail', ['slug'=> $post->slug]) }}">{{ $post->title }}</a></h5>
        <p class="card-text">{{ $post->detail }}</p>
        <p><a class="btn btn-secondary" href="{{route('site.post.detail', ['slug'=> $post->slug]) }}" role="button">Xem bài viết »</a></p>
    </div>
</div>

{{-- <div class="col-lg-4 text-center">
    <a href="{{route('site.post.detail', ['slug'=> $post->slug]) }}">
    <img class="rounded-circle" src="{{ asset('images/posts/'.$post->image)}}" alt="{{$post->image}}" width="140" height="140">
    <h2><a href="{{route('site.post.detail', ['slug'=> $post->slug]) }}">{{ $post->title }}</a></h2>
    <p>{{$post->detail}}</p>
    <p><a class="btn btn-secondary" href="{{route('site.post.detail', ['slug'=> $post->slug]) }}" role="button">Xem bài viết »</a></p>
  </div> --}}
