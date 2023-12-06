<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/Utama/Profile.css">
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


    <!-- profie -->

    <div class="container mt-5">
        <div class="row gap-5">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="box-profile p-4">
                    <br>
                    <H3 class="fw-bolder">PROFILE</H3>
                    <br>
                    <h6 class="fw-bolder">username</h6>
                    <h6 class="text-secondary"><?php echo $profile_data['u_name']; ?></h6>
                    <br>
                    <h6 class="fw-bolder">email</h6>
                    <h6 class="text-secondary"><?php echo $profile_data['email']; ?></h6>
                    <br>
                    <h6 class="fw-bolder">Nomor telepon</h6>
                    <h6 class="text-secondary"><?php echo $profile_data['no_telp']; ?></h6>
                    <br>
                    <br>
                    <a class="btn btn-warning mb-4" href="<?php echo base_url('profile/edit_user')?>">Edit Profile</a><br>
                    <a class="btn btn-warning mb-4" href="<?php echo base_url('profile/history/' . $profile_data['id_penghuni'])?>">History Pembayaran</a>
                    <form action="<?php echo base_url() ?>login/logout" method="post">
                        <button class="btn text-white" style="background-color: red;" type="submit">Logout</button>
                        <!--<input id="btn1" type="submit" value="Logout"></input> -->
                    </form>
                    <br>
                </div>
            </div>
        

            <div class="col-lg-8 ps-4 pe-4" style="word-wrap: break-word;">

                <div class="mobile">
                    <div class="box-profile p-4">
                        <br>
                        <H3 class="fw-bolder">PROFILE</H3>
                        <br>
                        <h6 class="fw-bolder">username</h6>
                        <h6 class="text-secondary"><?php echo $profile_data['u_name']; ?></h6>
                        <br>
                        <h6 class="fw-bolder">email</h6>
                        <h6 class="text-secondary"><?php echo $profile_data['email']; ?></h6>
                        <br>
                        <h6 class="fw-bolder">Nomor telepon</h6>
                        <h6 class="text-secondary"><?php echo $profile_data['no_telp']; ?></h6>
                        <br>
                        <br>
                        <a class="btn btn-warning mb-4" href="<?php echo base_url('profile/edit_user')?>">Edit Profile</a>
                        <a class="btn btn-warning mb-4" href="<?php echo base_url('profile/history/' . $profile_data['id_penghuni'])?>">History Pembayaran</a>
                        <form action="<?php echo base_url() ?>login/logout" method="post">
                            <button class="btn text-white" style="background-color: red;" type="submit">Logout</button>
                            <!--<input id="btn1" type="submit" value="Logout"></input> -->
                        </form>
                        <br>
                    </div>
                    <br>
                    <br>
                    <br>
                    
                </div>
                


                <div class="judul-profile p-4">
                    <div class="judul ps-3 pt-2">
                        <h4 class="fw-bolder">Kamar Anda</h4>
                    </div>
                </div> 

               <br>
                
               <?php foreach($kamar as $row){ ?>
               <div class="judul-profile p-4">
                    <div class="judul ps-3 pt-2" style="justify:left;">
                        <h2 class="fw-bolder">Kamar <?php echo $row->no_kmr; ?></h2>
                        <h6 class="text-secondary">Posisi: <?php echo $row->posisi; ?></h6>
                        <h6 class="text-secondary">Kamar mandi: <?php echo $row->KM; ?></h6>
                        <h6 class="text-secondary">Furnished: <?php echo $row->furnished; ?></h6>


                    </div>
                </div> 
                <br>


                <?php } ?>
               

            </div>
        </div>
    </div>       
    <br>
                    <br>
                    <br>

    <!-- end profile -->
<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>   
</body>
</html>