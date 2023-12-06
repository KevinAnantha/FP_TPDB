<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/Login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica&display=swap" rel="stylesheet">
</head>
<body>
    <!-- NAV Bar  -->
    <nav class="mb-5 navbar navbar-expand-lg" style="background-color: #153462;">
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
                <a href="<?php echo base_url()?>signin" class="btn text-white" style="background-color: #0D6EFD;" type="button">Sign Up</a>

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

    <!-- Login -->

    <div class="container login_container">
        <div class="row login_row bg-warning">
            <div class="col-sm-6 d-none d-sm-block login_image">
                <img id="img_login" src="asset/Image/Login.png" alt="">
            </div>
            <div class="col-sm-6 login_form">
                <div class="form_wrapper">
                    <br>
                    <form class="inputan" action="<?php echo base_url()?>login/aksi_login" method="POST">
                        <h1 Class="fw-bolder mb-4 pt-4">LOGIN</h1>
                        <label class="fw-bold">Username</label>
                        <br>
                        <input class="mt-2 form-control" type="username" name="username" id="username">
                        <br>
                        <label class="fw-bold">Password</label>
                        <br>
                        <input class="mt-2 form-control" type="password" name="password" id="password">
                        <button class="btn btn-primary mt-4" type="submit">Login</button>
                        <br>
                        <br>
                        dont have an account ?
                        <br>
                        <a href="<?php echo base_url()?>signin">register now</a>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <!-- End Login -->

<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>