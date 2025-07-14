<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>FreeCOOL BAC</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="{{ asset('logobac.png') }}" />
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/slick/slick.css" />
    <link rel="stylesheet" href="assets/css/slick/slick-theme.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/iconfont.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="assets/css/bootsnav.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>


    <style>
        .card {
            background: #fff;
            display: flex;
            flex-direction: column;
            height: 320px;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px 15px;
            overflow: hidden;
        }

        .card-title {
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: 600;
            max-height: 40px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card-text {
            font-size: 13px;
            margin: 2px 0;
            line-height: 1.2;
            color: #444;
            max-height: 40px;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        .image-popup {
            display: none;
            position: fixed;
            z-index: 9999;
            padding: 10px;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            border: 2px solid #ccc;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .image-popup img {
            max-width: 100%;
            max-height: 80vh;
        }

        .image-popup .close-btn {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }
    </style>

</head>

<body data-spy="scroll" data-target=".navbar-collapse">
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>

    <div class="culmn">
        <nav class="navbar navbar-default bootsnav navbar-fixed">
            <div class="navbar-top bg-grey fix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="navbar-callus text-left sm-text-center">
                                <ul class="list-inline">
                                    <li>
                                        <a href="https://wa.me/6283878238593" target="_blank">
                                            <i class="fa fa-phone"></i> Phone: 0838 7823 8593
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:freecoolbac2@gmail.com">
                                            <i class="fa fa-envelope-o"></i> Contact us: freecoolbac2@gmail.com
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="navbar-socail text-right sm-text-center">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a href="#brand" style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                        <img src="{{ asset('logobac.png') }}" alt="Logo" style="width: 60px; height: auto;" />
                        <span style="font-weight: bold; color: rgb(4, 69, 248); font-size: 20px;">FreeCOOL BAC</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">About</a></li>
                        <li><a href="#business">Service</a></li>
                        <li><a href="#test">Product</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        {{-- <li><a href="{{route('auth')}}">Login</a></li> --}}
                    </ul>
                </div>
            </div>
        </nav>

        <section id="home" class="home bg-black fix">
            <div class="overlay"></div>
            <div class="container">
                <div class="row" style="padding-top: 270px;">
                    <div class="main_home text-center">
                        <div class="col-md-12">
                            <div class="hello_slid">
                                <div class="slid_item">
                                    <div class="home_text">
                                        <h2 class="text-white">
                                            Welcome to <strong>FreeCOOL BAC</strong>
                                        </h2>
                                        <h1 class="text-white">
                                            Layanan AC & Kulkas Profesional
                                        </h1>
                                    </div>
                                </div>

                                <div class="slid_item">
                                    <div class="home_text">
                                        <h2 class="text-white">
                                            Welcome to <strong>FreeCOOL BAC</strong>
                                        </h2>
                                        <h1 class="text-white">
                                            Perawatan & Pembersihan AC & Kulkas
                                        </h1>
                                    </div>
                                </div>

                                <div class="slid_item">
                                    <div class="home_text">
                                        <h2 class="text-white">
                                            Welcome to <strong>FreeCOOL BAC</strong>
                                        </h2>
                                        <h1 class="text-white">
                                            Mitra UMKM Perawatan AC & Kulkas
                                        </h1>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="features">
            <div class="container">
                <div class="row">
                    <div class="main_features fix roomy-70">
                        @foreach ($superioritys as $item)
                            <div class="col-md-4">
                                <div class="features_item sm-m-top-30">
                                    <div class="f_item_icon">
                                        <img src="{{ asset('imagesuperiority/' . $item->image_superiority) }}"
                                            alt="{{ $item->title }}" style="width: 50px; height: 50px;">
                                    </div>
                                    <div class="f_item_text">
                                        <h3>{{ $item->title }}</h3>
                                        <p>{{ $item->decryption }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="portfolio" class="business bg-grey roomy-70">
            <div class="container">
                <div class="row">
                    <div class="main_business">
                        <div class="col-md-6">
                            <div class="business_slid">
                                <div class="slid_shap bg-grey"></div>
                                <div class="business_items text-center">
                                    <div class="business_item">
                                        <div class="business_img">
                                            <img src="assets/images/homebg.jpg" alt="" />
                                        </div>
                                    </div>

                                    <div class="business_item">
                                        <div class="business_img">
                                            <img src="assets/images/homebg.jpg" alt="" />
                                        </div>
                                    </div>

                                    <div class="business_item">
                                        <div class="business_img">
                                            <img src="assets/images/homebg.jpg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            @foreach ($aboutus as $about)
                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase">
                                        <strong>{{ $about->company }}</strong>
                                    </h2>
                                    <p class="m-top-20">
                                        {{ $about->about_us }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="business" class="product">
            <div class="container">
                <div class="main_product roomy-80">
                    <div class="head_title text-center fix">
                        <h2 class="text-uppercase">Our Service</h2>
                        <h5>FreeCool BAC</h5>
                    </div>

                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            @foreach ($images->chunk(4) as $chunkIndex => $serviceChunk)
                                <div class="item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($serviceChunk as $images)
                                                <div class="col-sm-3">
                                                    <div class="port_item xs-m-top-30">
                                                        <div class="port_img">
                                                            <img src="{{ asset('activityphotos_bac/' . $images->activity_photos) }}"
                                                                alt=""
                                                                style="width: 200px; height: 200px; object-fit: cover; border: 1px solid #ccc;" />
                                                            <div class="port_overlay text-center">
                                                                <a href="{{ asset('activityphotos_bac/' . $images->activity_photos) }}"
                                                                    class="popup-img">+</a>
                                                            </div>
                                                        </div>
                                                        <div class="port_caption m-top-20">
                                                            <h5>
                                                                <a
                                                                    href="{{ route('detail_service', ['id' => $images->id_service]) }}">
                                                                    {{ $images->category }}
                                                                </a>
                                                            </h5>
                                                            <h6>- {{ $images->decryption }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <a class="left carousel-control" href="#carousel-example-generic" role="button"
                            data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>

                        <a class="right carousel-control" href="#carousel-example-generic" role="button"
                            data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="test" class="test bg-grey roomy-60 fix">
            <div class="container">
                <div class="row">
                    <div class="main_test fix w-100">
                        <div class="col-md-12">
                            <div class="head_title text-center fix">
                                <h2 class="text-uppercase">Product BAC</h2>
                            </div>
                        </div>

                        @foreach ($products->chunk(6) as $productChunk)
                            <div class="row">
                                @foreach ($productChunk as $product)
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <div class="card mb-4 shadow-sm">
                                            <img src="{{ asset('product_bac/' . $product->product_image) }}"
                                                alt="{{ $product->product_name }}" class="img-responsive preview-img"
                                                style="width:100%; height:150px; object-fit:cover; cursor:pointer;"
                                                data-img="{{ asset('product_bac/' . $product->product_image) }}">

                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size: 14px;">
                                                    <a href="{{ route('detail_product', ['id' => $product->id_product]) }}"
                                                        style="color: inherit; text-decoration: none;">
                                                        {{ $product->product_name }}
                                                    </a>
                                                </h5>


                                                <p class="card-text" style="font-size: 13px;">Stock:
                                                    {{ $product->stock }}</p>
                                                <p class="card-text" style="font-size: 13px;">
                                                    Price: Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <!-- Pop Image Preview -->
                        <div id="imagePopUp" class="image-popup">
                            <span class="close-btn">&times;</span>
                            <img id="popupImage" src="" alt="Preview" />
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <section id="brand" class="brand fix roomy-80">
            <div class="head_title text-center fix">
                <h2 class="text-uppercase">Client</h2>
                <h5>FreeCool BAC</h5>
            </div>
            <div class="container">
                <div class="row">
                    <div class="main_brand text-center">
                        @foreach ($clients as $client)
                            <div class="col-md-2 col-sm-4 col-xs-6" style="margin-bottom: 30px;">
                                <div class="brand_item sm-m-top-20">
                                    <img src="{{ asset('logo_client/' . $client->client_logo) }}" alt="Client Logo"
                                        style="width: 100%; height: 100px; object-fit: contain;" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        <footer id="contact" class="footer action-lage bg-black p-top-80">
            <div class="container">
                <div class="row">
                    <div class="widget_area">
                        <div class="col-md-3">
                            <div class="widget_item widget_about">
                                <h5 class="text-white">FreeCool BAC</h5>

                                <div class="widget_ab_item m-top-30">
                                    <div class="item_icon">
                                        <i class="fa fa-location-arrow"></i>
                                    </div>
                                    <div class="widget_ab_item_text">
                                        <h6 class="text-white">Location</h6>
                                        <p>{{ $about->address ?? 'Alamat belum tersedia' }}</p>
                                    </div>
                                </div>

                                <div class="widget_ab_item m-top-30">
                                    <div class="item_icon"><i class="fa fa-phone"></i></div>
                                    <div class="widget_ab_item_text">
                                        <h6 class="text-white">Phone :</h6>
                                        <p>{{ $about->phone ?? 'Nomor belum tersedia' }}</p>
                                    </div>
                                </div>

                                <div class="widget_ab_item m-top-30">
                                    <div class="item_icon"><i class="fa fa-envelope-o"></i></div>
                                    <div class="widget_ab_item_text">
                                        <h6 class="text-white">Email Address :</h6>
                                        <p>{{ $about->email ?? 'Email belum tersedia' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-30 m-top-80">
                <div class="col-md-12">
                    <span style="display: inline-flex; align-items: center; gap: 10px;">
                        <img src="{{ asset('favicon_pstechno.png') }}" alt="Logo PSTECHNO"
                            style="width: 150px; height: auto;" class="light-logo" />
                        By Design : PSTECHNO | ᮕᮥᮒᮁᮃ ᮞᮤᮜᮤᮝᮃᮍᮤ ᮒᮨᮎ᮪ᮂᮔᮧᮜᮧᮌ᮪ᮚ᮪ | <?= date('Y') ?> .
                    </span>
                </div>
            </div>
        </footer>
    </div>

    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/css/slick/slick.js"></script>
    <script src="assets/css/slick/slick.min.js"></script>
    <script src="assets/js/jquery.collapse.js"></script>
    <script src="assets/js/bootsnav.js"></script>

    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        document.querySelectorAll('.preview-img').forEach(img => {
            img.addEventListener('click', function() {
                const src = this.getAttribute('data-img');
                document.getElementById('popupImage').src = src;
                document.getElementById('imagePopUp').style.display = 'block';
            });
        });

        document.querySelector('.image-popup .close-btn').addEventListener('click', function() {
            document.getElementById('imagePopUp').style.display = 'none';
        });
    </script>

</body>

</html>
