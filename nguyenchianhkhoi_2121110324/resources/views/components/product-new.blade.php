<div class="section_product_new my-5">
    <div class="container">
        <h1 class="text-success text-uppercase mb-4">Sản phẩm mới</h1>
        <div class="row">
            @foreach($product_new as $product_item)
            <div class="col-md">
                <x-product-card :productitem="$product_item"/>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button class="btn btn-success px-5">Xem thêm sản phẩm</button>
            </div>
        </div>
    </div>
</div>
