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
                    <a href="{{ route('home') }}"
                        style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                        <img src="{{ asset('logobac.png') }}" alt="Logo" style="width: 60px; height: auto;" />
                        <span style="font-weight: bold; color: rgb(4, 69, 248); font-size: 20px;">FreeCOOL BAC</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('home') }}">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id="test" class="test bg-grey roomy-60 fix" style="margin-top: 100px;">
            <div class="container">
                <div class="row">
                    <div class="main_test fix">
                        <div class="container mt-5">
                            <h2 class="mb-4">{{ $service->category }}</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('activityphotos_bac/' . $service->activity_photos) }}"
                                        alt="{{ $service->category }}" class="img-fluid rounded border"
                                        style="object-fit: cover; max-height: 200px;">
                                </div>
                                <div class="col-md-6">
                                    <h5>Decryption:</h5>
                                    <p>{{ $service->decryption }}</p>
                                </div>
                            </div>

                            {{-- Tambahkan tabel di bawah --}}
                            <div class="mt-5 pt-5">
                                <div class="row">
                                    @forelse ($images as $img)
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                                            <div class="card h-100 shadow-sm">
                                                @if ($img->activity_photosbac)
                                                    <img src="{{ asset('activityphotos_bac/' . $img->activity_photosbac) }}"
                                                        class="card-img-top img-clickable" alt="Activity Photos BAC"
                                                        style="height: 180px; object-fit: cover; cursor:pointer;"
                                                        data-full="{{ asset('activityphotos_bac/' . $img->activity_photosbac) }}">
                                                @else
                                                    <div class="card-body text-center">
                                                        <span class="text-muted">Tidak ada gambar</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <div class="alert alert-warning">Tidak ada gambar yang ditemukan.</div>
                                        </div>
                                    @endforelse
                                </div>

                                <!-- Modal dengan tombol close -->
                                <div id="imageModal"
                                    style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:9999; flex-direction: column;">
                                    <button id="closeModal"
                                        style="align-self: flex-end; margin: 10px 20px 0 0; background: transparent; border: none; font-size: 30px; color: white; cursor: pointer; font-weight: bold;">
                                        &times;
                                    </button>
                                    <img id="modalImg" src="" alt="Preview"
                                        style="max-width:90%; max-height:90%; border-radius:8px; box-shadow:0 0 15px #fff;">

                                </div>
                            </div>
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
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImg');
        const closeBtn = document.getElementById('closeModal');

        document.querySelectorAll('.img-clickable').forEach(img => {
            img.onclick = () => {
                modalImg.src = img.dataset.full;
                modal.style.display = 'flex';
            };
        });

        // Klik tombol close untuk tutup modal
        closeBtn.onclick = (e) => {
            e.stopPropagation(); // supaya event gak sampai ke modal background
            modal.style.display = 'none';
        };

        // Klik di luar gambar (background modal) untuk tutup modal
        modal.onclick = () => {
            modal.style.display = 'none';
        };

        // Supaya klik di gambar gak nutup modal
        modalImg.onclick = (e) => {
            e.stopPropagation();
        };
    </script>
</body>

</html>
