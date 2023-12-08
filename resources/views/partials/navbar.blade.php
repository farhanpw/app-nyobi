<nav class="navbar navbar-expand-lg navbar-dark  navbar-center navbar-custom fixed-top" id="demo1Navbar">
    <div class="container">
        <a class="navbar-brand me-auto" href="/"><img src="/uploads/nyobi_png.png" alt="logo" style="width: 50px">Nyobi
            ah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 " href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 " href="/products">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2  " href="/about">About</a>
                </li>

            </ul>


            <ul class="navbar-nav ms-auto">
                <li class="ms-1 nav-item">
                    <div class="nav-cart-outer">
                        <div class="nav-cart-inner">
                            <a href="/cart" class="btn peach nav-link"><i class="bi bi-bag"></i></a>
                        </div>
                    </div>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome, {{ auth()->user()->name }}

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profil"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                    My Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="GET">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"> Logout </i>
                                    </button>
                                </form>
                        </ul>
                    </li>
                @else
                    <li class="ms-1 nav-item">
                        <a href="/login" class="btn brown nav-link text-white">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


@push('js')
<script src="/js/navonscroll.min.js"></script>
  <!-- Function Call --> 
  <script>
    hide_on_scroll({
      nav_id : 'demo1Navbar'
    });
  </script>

@endpush