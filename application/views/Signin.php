<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login FreeJect</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/Signin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica&display=swap" rel="stylesheet">
</head>
<body>
    <!-- NAV Bar  -->
    <nav class="navbar navbar-expand-lg mb-5" style="background-color: #153462;">
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
            <a href="<?php echo base_url()?>/login" class="btn text-white" style="background-color: #0D6EFD;" type="button">Login</a>
            </li>
        </ul>

        </div>
    </div>
    </nav>
    <!-- End NAV Bar  -->

    <!-- Login -->

    <div class=" mb-4 pb-5 container login_container">
        <div class="pb-4 row login_row bg-warning">
            <div class="col-sm-6 login_form">
                <div class="form_wrapper">
                    <form class="inputan ps-4" action="<?php echo base_url()?>/Signin/aksi_signin" method="POST">
                        <h1 Class="fw-bolder mb-2 pt-4">Sign Up</h1>
                        <br>
                        <label class="fw-bold">Email</label>
                        <br>
                        <input class="mt-2 form-control" type="email" name="email" id="email">
                        <br>
                        <label class="fw-bold">Username</label>
                        <br>
                        <input class="mt-2 form-control" type="text" name="username" id="username">
                        <br>
                        <label class="fw-bold">Password</label>
                        <br>
                        <input class="mt-2 form-control" type="password" name="password" id="password">
                        <br>
                        <label class="fw-bold">Nomor Telpon</label>
                        <br>
                        <input class="mt-2 form-control" type="text" name="telp" id="telp">
                        <br>
                        <br>
                        <button class="btn btn-primary mt-2 mb-4" type="submit">Sign Up</button>
                        <br>
                        already have an account?
                        <br>
                        <a href="<?php echo base_url()?>login">Login</a>
                        
                    </form>
                </div>
            </div>
            <div class="col-sm-6 d-none d-sm-block login_image">
                <img id="img_login" src="asset/Image/Signin.png" alt="">
            </div>
        </div>
    </div> 
    <!-- End Login -->

<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>