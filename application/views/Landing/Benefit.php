<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Muslim</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/Benefit.css">

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



    <!-- Features -->

    <div class="container mt-5 container_benefit">
        <div class="row gap-5">
            <div class="col-md p-5 ps-5 kotak_fitur">
                <h2 class="fw-bolder pb-3">Fasilitas & Kenyamanan</h2>
                <hr>
                <div class="row">
                <div class="col-xl-5">
                    <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-hasil-list" data-bs-toggle="list" href="#list-hasil" role="tab" aria-controls="list-hasil">Fasilitas Lengkap</a>
                    <a class="list-group-item list-group-item-action" id="list-skill-list" data-bs-toggle="list" href="#list-skill" role="tab" aria-controls="list-skill">Lokasi Strategis</a>
                    <a class="list-group-item list-group-item-action" id="list-relasi-list" data-bs-toggle="list" href="#list-relasi" role="tab" aria-controls="list-relasi">Keamanan Terjamin</a>
                    <a class="list-group-item list-group-item-action" id="list-produktif-list" data-bs-toggle="list" href="#list-produktif" role="tab" aria-controls="list-produktif">Harga Terjangkau</a>
                    </div>
                </div>
                <div class="col-xl-7 mt-4">
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-hasil" role="tabpanel" aria-labelledby="list-hasil-list"><h5 class="fw-bold">Kami menyediakan kamar tidur bersih, tempat parkir, tempat menjemur, dan akses Wi-Fi* untuk memenuhi kebutuhan sehari-hari Anda.</h5></div>
                    <div class="tab-pane fade" id="list-skill" role="tabpanel" aria-labelledby="list-skill-list"><h5 class="fw-bold">Terletak di pusat kota, dekat dengan pusat perbelanjaan, kampus, dan tempat penting lainnya untuk kenyamanan Anda.</h5></div>
                    <div class="tab-pane fade" id="list-relasi" role="tabpanel" aria-labelledby="list-relasi-list"><h5 class="fw-bold">Lingkungan yang kondusif dan jauh dari kata rawan tindak kejahatan menjadikan kos ini tempat yang tepat untuk dihuni</h5></div>
                    <div class="tab-pane fade" id="list-produktif" role="tabpanel" aria-labelledby="list-produktif-list"><h5 class="fw-bold">Kami menawarkan kualitas tinggi dengan harga yang bersahabat, memastikan Anda mendapatkan nilai terbaik.</h5></div>
                    </div>
                </div>
                </div>

            </div>
            <div class="col-md p-5 ps-5 kotak_fitur">
                <h2 class="fw-bolder pb-3">Lingkungan & Aksesibilitas</h2>
                <hr>
                <div class="row">
                <div class="col-xl-5">
                    <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-efisien-list" data-bs-toggle="list" href="#list-efisien" role="tab" aria-controls="list-efisien">Lingkungan Ramah</a>
                    <a class="list-group-item list-group-item-action" id="list-efektif-list" data-bs-toggle="list" href="#list-efektif" role="tab" aria-controls="list-efektif">Akses Mudah ke Pusat Kota</a>
                    <a class="list-group-item list-group-item-action" id="list-relasis-list" data-bs-toggle="list" href="#list-relasis" role="tab" aria-controls="list-relasis">Akses yang Mudah dengan Kendaraan</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Fasilitas Terdekat</a>
                    </div>
                </div>
                <div class="col-xl-7 mt-4">
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-efisien" role="tabpanel" aria-labelledby="list-efisien-list"><h5 class="fw-bold">Suasana kos yang hangat dan persaudaraan di antara penghuni, menciptakan lingkungan yang nyaman.</h5></div>
                    <div class="tab-pane fade" id="list-efektif" role="tabpanel" aria-labelledby="list-efektif-list"><h5 class="fw-bold">Memungkinkan Anda untuk dengan mudah mengakses berbagai kegiatan dan hiburan kota.</h5></div>
                    <div class="tab-pane fade" id="list-relasis" role="tabpanel" aria-labelledby="list-relasis-list"><h5 class="fw-bold"> Terletak di jalan yang cukup lebar, memudahkan akses dengan mobil, motor, dan kendaraan pribadi lainnya.</h5></div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"><h5 class="fw-bold">Terdapat pusat perbelanjaan, restoran, dan toko-toko terdekat, mempermudah kehidupan sehari-hari Anda.</h5></div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>

    <!-- End Features -->


<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>   
</body>
</html>