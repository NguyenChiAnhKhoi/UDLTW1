<div id="header-carousel" class="carousel slide" data-ride="carousel">
    @foreach ($list_banner as $row)
        @if ($loop->first)
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner/' . $row->image) }}" class="d-block w-100" alt="...">
                  </div>
            @else
            <div class="carousel-item">
                <img src="{{ asset('images/banner/' . $row->image) }}"class="d-block w-100" alt="...">
              </div>
            </div>
        @endif
    @endforeach
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
<!-- End Footer Section -->

<script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>


{{-- <div class="carousel-item active" style="height: 410px;">
    <img class="img-fluid" src="{{ asset('images/banner/' . $row->image) }}" alt="{{ $row->image }}">
    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
        <div class="p-3" style="max-width: 700px;">
            <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
            <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
            <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
        </div>
    </div>
</div> --}}
