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
    <link rel="stylesheet" href="market/bootstrap-5.0.2-dist/css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="market/css/main.css">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.html">
                <img src="market/images/shopping-bag-icon.png" alt="site icon">
                <span class="text-uppercase fw-lighter ms-2">Tyas MarketPlace</span>
            </a>


            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#header">home</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#collection">Product</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#about">about</a>
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
                    <i class="fa fa-shopping-cart"></i>
                </a>
                @guest
                    <div class="order-lg-2 nav-btns">
                        <a href="/login" class="btn position-relative">Login</a>
                    </div>

                @endguest

                @auth
                    <div class="order-lg-2 nav-btns">
                        <a href="/logout" class="btn position-relative">Logout</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- header -->
    <header id="header" class="vh-100 carousel slide" data-bs-ride="carousel" style="padding-top: 104px;">
        <div class="container h-100 d-flex align-items-center carousel-inner">
            <div class="text-center carousel-item active">
                <h2 class="text-capitalize text-white">best collection</h2>
                <h1 class="text-uppercase py-2 fw-bold text-white">new arrivals</h1>
                <a href="#" class="btn mt-3 text-uppercase">shop now</a>
            </div>
            <div class="text-center carousel-item">
                <h2 class="text-capitalize text-white">best price & offer</h2>
                <h1 class="text-uppercase py-2 fw-bold text-white">new season</h1>
                <a href="/product" class="btn mt-3 text-uppercase">buy now</a>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </header>
    <!-- end of header -->

    <section id="collection" class="py-5" style="text-align: center">
        <div class="container">
            <h2>Feature Producte</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid corrupti voluptatem nihil temporibus
                voluptatum odio.</p>
            <div class="pro-container" style="display: flex; padding-top: 20px; flex-wrap: wrap; gap: 20px; ">
                @foreach ($productList as $item)
                    <div class="pro "
                        style="width:   23%; min-width: 250px; padding: 10px 12px; border: 1px solid #cce7d0; border-radius: 25px; box-shadow: 20px 20px 30px rgba(0,0,0,0.02); margin: 15px 0; position: relative">
                        <img src="{{ $item->image != null ? asset('storage/image/' . $item->image) : asset('image/image-notfound.jpg') }}"
                            alt="" style="width: 100%; border-radius: 20px;">
                        <div class="des" style="text-align: start; padding: 10px 0;">
                            @foreach ($item->categories as $category)
                                <span style="color: #606063; font-size: 12px;">{{ $category->name }}</span>
                            @endforeach
                            <h5 style="padding-top: 7px; color:#1a1a1a; font-size: 16px;">{{ $item->name }}</h5>
                            <div class="star" style="font-size: 12px; color: rgb(243,181,25);">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 style="padding-top: 7px; font-size: 15px; font-weight:700; color: #088178;">
                                Rp.{{ $item->price }}</h4>
                        </div>


                        <a href="/detail/{{ $item->slug }}"
                            style="line-height: 30px;  padding: 4px;  border-radius: 20px; background-color: #e8f6ea; font-weight: 1000; color: #088178; border: 1px solid #cce7d0; position: absolute; bottom: 20px; right: 10px; text-decoration: none;">
                            Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- collection -->

    {{-- <section id="collection" class="py-5">
        <div class="container">
            <div class="title text-center">
                <h2 class="position-relative d-inline-block">New Collection</h2>
            </div>

            <div class="row g-0">
                <div class="mt-4 row gx-0 gy-3">
                    @foreach ($productList as $item)
                        <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
                            <div class="collection-img position-relative">
                                <img src="{{ $item->image != null ? asset('storage/image/' . $item->image) : asset('image/image-notfound.jpg') }}"
                                    class="w-100" style="object-fit: cover; max-height: 200px;" draggable="false">

                                <span
                                    class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                            </div>
                            <div class="text-center">
                                <div class="rating mt-3">
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                </div>
                                <p class="text-capitalize my-1">{{ $item->name }}</p>
                                <span class="fw-bold">Rp.{{ $item->price }}</span>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $item->id }}">
                                    Lihat Detail
                                </button>
                                <div class="modal fade" id="staticBackdrop{{ $item->id }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail
                                                    Product
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card mb-3" style="max-width: 540px;">
                                                    <div class="row g-0">
                                                        <div class="position-relative"
                                                            style="width: 100%; height: 0; padding-bottom: 100%;  overflow: hidden;">
                                                            <img src="{{ $item->image != null ? asset('storage/image/' . $item->image) : asset('image/image-notfound.jpg') }}"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="col-md-8">
                                                                <div class="card-body d-flex flex-column w-100 h-100">
                                                                    <h5 class="card-title">{{ $item->name }}</h5>
                                                                    <p class="card-text flex-grow-1">This is a
                                                                        wider
                                                                        card with supporting text below as a natural
                                                                        lead-in to additional content. This content
                                                                        is a
                                                                        little bit longer.</p>
                                                                    <p class="card-text"><small
                                                                            class="text-muted">Last updated 3 mins
                                                                            ago</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Add to
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section> --}}


    <!-- about us -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row gy-lg-5 align-items-center">
                <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class="title pt-3 pb-5">
                        <h2 class="position-relative d-inline-block ms-4">About Us</h2>
                    </div>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis,
                        ipsam.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem fuga blanditiis, modi
                        exercitationem quae quam eveniet! Minus labore voluptatibus corporis recusandae accusantium
                        velit, nemo, nobis, nulla ullam pariatur totam quos.</p>
                </div>
                <div class="col-lg-6 order-lg-0">
                    <img src="market/images/about_us.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->

    <body class="d-flex flex-column">
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
        <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
            <div class="container text-center">
                <small>Copyright &copy; Tyas MarketPlace</small>
            </div>
        </footer>


        <!-- jquery -->
        <script src="market/js/jquery-3.6.0.js"></script>
        <!-- isotope js -->
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
            integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
        </script>
        <!-- custom js -->
        <script src="market/js/script.js"></script>
    </body>

</html>
