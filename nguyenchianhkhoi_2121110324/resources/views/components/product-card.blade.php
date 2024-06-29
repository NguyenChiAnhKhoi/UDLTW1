<div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
    <a href="{{route('site.product.detail', ['slug'=> $product->slug]) }}">
    <img class="img-fluid w-100" src="{{ asset('images/products/'.$product->image)}}" alt="{{$product->image}}">
    </a>
</div>
<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
    <h6 class="text-truncate mb-3"><a href="{{route('site.product.detail', ['slug'=> $product->slug]) }}">{{ $product->name }}</a></h6>
    <div class="d-flex justify-content-center">
        @if ($product->pricesale > 0 && $product->pricesale < $product->price)
        <h6>{{ number_format($product->pricesale)}}</h6>
        <h6 class="text-muted ml-2"><del>{{ number_format($product->price)}}</del></h6>
        @else
        <h6>{{ number_format($product->price)}}</h6>
        @endif
    </div>
    <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
        <a href="#!" class="text-dark fw-bold">Cancel</a>
        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Buy now</button>
      </div>
</div>
