<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Muslim</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/Landingpage.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica&display=swap" rel="stylesheet"> 
</head>
<body>
    <!-- NAV Bar  -->
        <nav class="navbar navbar-expand-lg" style="background-color: #153462;">
    <div class="container-fluid">
        <a class="navbar-brand pe-3 ps-4 text-white fw-bolder fs-4" href="<?php echo base_url()?>">Kos Muslim</a>
        <button class="bg-warning navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="<?php echo base_url()?>home">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo base_url()?>Benefit">Benefit</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo base_url()?>Profile">Profile</a>
            </li>
            
        </ul>
        

        <ul class="navbar-nav ms-auto">
            <li class="nav-item pe-4">
            <?php if($this->session->userdata('username') == '') : ?>
                <a href="<?php echo base_url()?>/login" class="btn text-white" style="background-color: #0D6EFD;" type="button">Login</a>

            <?php else : ?>
                <form action="<?php echo base_url() ?>login/logout" method="post">
                    <button class="btn text-white" style="background-color: red;" type="submit">Logout</button>
                    <!--<input id="btn1" type="submit" value="Logout"></input> -->
                </form>
            
            <?php endif ?>
            </li>
        </ul>

        </div>
    </div>
    </nav>
    <!-- End NAV Bar  -->

    <!-- Slide Content -->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active c-item">
      <img src="<?php echo base_url()?>/asset/Image/kos1.jpg" class="d-block w-100 c-img" alt="...">
      <div class="carousel-caption top-0 mt-5">
        <br>
        <p class="mt-5 fs-3">LINGKUNGAN AMAN DAN NYAMAN</p>
        <H1 class="display-1 fw-bolder text-capitalize">Kos Bapak Hasyim</H1>
        <a href="https://maps.app.goo.gl/GRRgW6LMRWMy8ZTYA" class="btn btn-primary px-4 py-2 fs-5 mt-5">Cek Lokasi</a>

      </div>
    </div>
    <div class="carousel-item c-item">
      <img src="<?php echo base_url()?>/asset/Image/kos2.jpg" class="d-block w-100 c-img" alt="...">
      <div class="carousel-caption top-0 mt-5">
        <br>
      <p class="mt-5 fs-3">LOKASI STRATEGIS</p>
        <H1 class="display-1 fw-bolder text-capitalize">HARGA TERJANGKAU<?php echo "*"?></H1>
        <a href="<?php echo base_url()?>/home" class="btn btn-primary px-4 py-2 fs-5 mt-5">Cek Ketersediaan Kamar</a>
      </div>
    </div>
    <div class="carousel-item c-item">
      <img src="<?php echo base_url()?>/asset/Image/kos3.jpg" class="d-block w-100 c-img" alt="...">
      <div class="carousel-caption top-0 mt-5">
        <br>
      <p class="mt-5 fs-3">CEK DAN PESAN KAMAR DIMANAPUN DAN </p>
        <H6 class="display-1 fw-bolder text-capitalize">KAPANPUN</H6>
        <a href="<?php echo base_url()?>/signin" class="btn btn-primary px-4 py-2 fs-5 mt-5">Daftar Sekarang</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- End Slide Content -->

    <!-- Content Keunggulan -->

    <div class="container mt-5 ml-2 mr-2 container_keunggulan">
        <div class="row mt-3 mb-4 p-3 gap-4">
            <div class="col-md keunggulan">
                <img class="mt-4" src="<?php echo base_url()?>/asset/Icon/project.png" alt="">
                <h2 class="p-3 fs-5 mt-2 fw-bold text-uppercase">PEMESANAN KAMAR YANG MUDAH</h2>
            </div>
            <div class="col-md keunggulan">
                <img class="mt-4" src="<?php echo base_url()?>/asset/Icon/free.png" alt="">
                <p class="p-3 fs-5 mt-2 fw-bold text-uppercase">BEBAS BIAYA DENDA</p>
            </div>
            <div class="col-md keunggulan">
                <img class="mt-4" src="<?php echo base_url()?>/asset/Icon/handshake.png" alt="">
                <p class="p-3 fs-5 mt-2 fw-bold text-uppercase">LINGKUNGAN YANG KOMPAK</p>
            </div>
        </div>
    </div>

    <!-- End Content Keunggulan -->


    <!-- Content Penjelasan --> 
        <div class="container mt-1 pt-3 ml-2 mr-2">
            <div class="row mt-1 mb-4 p-3">
                <div class="col-lg-5">
                    <img id="ilustrasi" src="<?php echo base_url()?>/asset/Image/freelance.png" alt="">
                </div>
                <div class="col-lg-7 pt-5">
                    <h2 class="fw-bolder ps-5 text-white">Kos Muslim Bapak Hasyim</h2>
                    <br>
                    <h4 class="ps-5 text-white">
                    Selamat datang di Kos Bapak Hasyim, tempat nyaman di pusat kota untuk tinggal, belajar, dan bekerja. Terletak di tengah kota, dekat pusat perbelanjaan, kampus, dan fasilitas penting dengan harga yang pas dikantong.
                    <h4>
                </div>
            </div>
        </div>
    <!-- End Content Penjelasan --> 


    <!-- Faq -->
    <div class="container pt-2 ml-2 mr-2">
            <h1 Class="fw-bolder ps-5 pe-5 me-3 ms-3 mb-5 text-white" style="text-align:center;">FAQ</h1>
            <div class="row mt-1 mb-5 ms-5 me-5">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item mb-2" style="border-radius:25px">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="border-radius:25px">
                    Kos Bapak hasyim termasuk kos putra atau putri ?
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Kos bapak hasyim hanya khusus untuk para penghuni putra</div>
                </div>
            </div>
            <div class="accordion-item mb-2" style="border-radius:25px">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="border-radius:25px">
                    Apakah kos ini kamar mandi dalam ?
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Iya, semua kos bapak hasyim dilengkapi fitur kamar mandi dalam</div>
                </div>
            </div>
            <div class="accordion-item mb-2" style="border-radius:25px">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" style="border-radius:25px">
                    Apakah fasilitas listrik sudah termasuk dalam biaya kos ?
                </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Tidak, setiap kamar kos dilengkapi dengan masing masing meteran listrik yang nantinya penghuni bisa mengisi token listrik masing masing </div>
                </div>
            </div>
            </div>
            </div>
    </div>
    <br>
    <br>
    <!-- End Faq -->




<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>