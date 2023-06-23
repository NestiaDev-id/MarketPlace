<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketPlace Home</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
    ">
    <link rel="stylesheet" href="{{ asset('market/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('market/css/main.css') }}">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-white py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="/">
                <span class="text-uppercase fw-lighter ms-2">Tyas MarketPlace</span>
            </a>


            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="/#header">home</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="/#collection">Product</a>
                    </li>


                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="/#about">about</a>
                    </li>
                    @auth()
                        @if (Auth::user()->role_id == 1)
                            <li class="nav-item px-2 py-2">
                                <a class="nav-link text-uppercase text-dark" href="/dashboard">Dashboard</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <a href="/cart" class="btn position-relative">
                    <i class="fa fa-shopping-cart" style="margin-right: 10px margin-bottom: 10px"></i>
                </a>
                {{-- jika user belum login --}}
                @guest
                    <div class="order-lg-2 nav-btns">
                        <a href="/login" class="btn position-relative"
                            style="margin-right: 10px margin-bottom: 10px">Login</a>
                    </div>
                @endguest


                {{-- jika user sudah login --}}
                @auth
                    <div class="order-lg-2 nav-btns">
                        <a href="/logout" class="btn position-relative"
                            style="margin-right: 10px margin-bottom: 10px">Logout</a>
                    </div>

                @endauth
            </div>
        </div>
    </nav>
    <!-- end of navbar -->



    @yield('content')


    <div id="page-content">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <h1 class="fw-light mt-4 text-white">Universitas Sanata Dharma</h1>
                    <p class="lead text-white-50">Terimakasih sudah mengunjungi Website Kami</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="fixed-bottom py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Tyas MarketPlace</small>
        </div>
    </footer>


    <!-- jquery -->
    <script src="{{ asset('market/js/jquery-3.6.0.js') }}"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <!-- custom js -->
    <script src="{{ asset('market/js/script.js') }}"></script>

</body>

</html>
