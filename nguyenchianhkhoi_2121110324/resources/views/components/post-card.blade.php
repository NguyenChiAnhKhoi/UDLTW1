<div class="card-header post-img position-relative overflow-hidden bg-transparent border p-0">
    <a href="{{route('site.post.detail', ['slug'=> $post->slug]) }}">
    <img class="img-fluid w-100" src="{{ asset('images/posts/'.$post->image)}}" alt="{{$post->image}}">
    </a>
</div>
<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
    <h6 class="text-truncate mb-3"><a href="{{route('site.post.detail', ['slug'=> $post->slug]) }}">{{ $post->name }}</a></h6>
    <div class="d-flex justify-content-center">

testttt
    </div>
</div>
