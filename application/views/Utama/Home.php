<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Muslim</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/Utama/Home.css">
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

<!-- Start Content -->
<div class="container">
    <br><br>
    <div class="row p-3">
    <?php foreach ($kamar as $row) { ?>
        <div class="col-lg-5 mx-auto" style="word-wrap: break-word;">
            <?php if (!empty($row->id_penghuni)) { ?>
                <div class="mb-5 box_content p-5" style="background-color:#868a91;">
                    <h3 class="fw-bolder"><?php echo $row->no_kmr; ?></h3>
                    <h6 class=""><?php echo $row->posisi; ?></h6>
                    <h6 class=""><?php echo $row->ukuran; ?></h6>
                    <br>
                    <br>
                    <button class="btn btn-danger" disabled>Full</button>
                    <br>
                    <br>
                </div>
            <?php } else { ?>
                <a style="text-decoration:none;" class="text-black" href="<?php echo site_url('home/detail/' . $row->id_kmr); ?>">
                    <div class="mb-5 box_content p-5 change-color">
                        <h3 class="fw-bolder"><?php echo $row->no_kmr; ?></h3>
                        <h6 class="text-secondary"><?php echo $row->posisi; ?></h6>
                        <h6 class="text-secondary"><?php echo $row->ukuran; ?></h6>
                        <br>
                        <br>
                        Harga : Rp. <?php echo number_format($row->harga, 0, ',', '.'); ?> /bulan
                        <br>
                        <br>
                    </div>
                </a>
            <?php } ?>
            <br>
        </div>
    <?php } ?>
</div>

</div>
<!-- End Content -->

<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
