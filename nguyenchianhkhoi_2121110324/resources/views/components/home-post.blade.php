<div class="container">
    <h1 class="mb-4 text-center">Tat ca bai viet</h1>
    <div class="row">


            <div class="row">
            @foreach($post as $post_item)
            <div class="col-md-4">
                <x-post-card :postitem="$post_item"/>
            </div>


        @endforeach
            </div>

    </div>









</div>
