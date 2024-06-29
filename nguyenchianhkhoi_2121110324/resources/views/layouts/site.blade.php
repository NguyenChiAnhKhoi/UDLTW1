<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js') }}"></script> --}}
   <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
</head>
<body>
{{-- Header --}}

<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('site.home') }}">Trang chủ</a>
              </li>

              <li class="nav-item">
                <x-main-menu/>

              </li>


                @if(Auth::check())
                @php
                    $user=Auth::user();
                @endphp
                   <li class="nav-item">
                    {{$user->name}}
                    <a class="nav-link" href="{{route('website.logout')}}">Đăng xuất</a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('website.getlogin')}}">Đăng nhập</a>
                  </li>
                  @endif
              {{-- </li> --}}

            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div>
                @php
                    $count = count(session('carts', []));
                @endphp
                <a href="{{ route('site.cart.index') }}">Gio hang (<spa id="showqty">{{ $count }}</span>)</a>

            </div>
          </div>
        </div>
      </nav>
    </header>

      {{-- End Header --}}


    <main>
        @yield('content')

    </main>

    {{-- Footer --}}

    <footer class="footer bg-primary">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('img/footer-logo.png') }}" alt=""/></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="{{ asset('img/payment.png') }}" alt=""/></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivery</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Newsletter</h6>
                        <div class="footer__newsletter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email"/>
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>© <script>document.write(new Date().getFullYear());</script> Your Website All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>

</footer>


{{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script> --}}

</body>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
</html>
