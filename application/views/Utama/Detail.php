<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Muslim</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/Utama/Detail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

    <!-- Details -->
    <div class="container mt-5">
    <div class="row">
        <?php foreach ($detail as $row) { ?>
            <div class="col-md-12 mx-auto">
                <div class="mb-5 box_detail p-5" style="width:auto; height:auto;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="foto mb-3 mb-md-0">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                <?php $first = true; ?>
                                <?php foreach ($detail_pic as $row2) { ?>
                                    <div class="carousel-item <?php echo ($first ? 'active' : ''); ?>">
                                    <a href="<?php echo base_url($row2->picture)?>" target="_blank">
        							    <img class="d-block mx-auto w-100" src="<?php echo base_url($row2->picture)?>" alt="" style="max-width: 100%; max-height: 100%;">
    							    </a>
                                    </div>
                                    <?php $first = false; ?>
                                <?php } ?>
                            </div>


                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div>
                                <h2 class="fw-bolder">Kamar <?php echo $row->no_kmr; ?></h2>
                                <h6 class="text-secondary">Posisi: <?php echo $row->posisi; ?></h6>
                                <h6 class="text-secondary">Kamar mandi: <?php echo $row->KM; ?></h6>
                                <h6 class="text-secondary">Furnished: <?php echo $row->furnished; ?></h6>
                                <a class="btn bg-success text-white mt-3" href="<?php echo base_url('Snap/pesan/' . $row->no_kmr . '/' . $row->posisi . '/' . $row->harga . '/' . $row->id_kmr . '/') ?>">Rp. <?php echo number_format($row->harga, 0, ',', '.'); ?></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

    <!-- End Details -->
    
    

<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>