<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freeject</title>
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
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="mb-5 box_detail p-5">
                <div class="row ml-2 pt-4">
                    <h1 class="mb-5">Edit <b>User</b></h1>

                    <form action="<?php echo base_url()?>profile/update_user/<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                    <?php foreach($ph as $phs) { ?>
                    <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input value="<?php echo $phs->u_name; ?>" type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input value="<?php echo $phs->email; ?>" type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
                        <input value="<?php echo $phs->nama_lengkap; ?>" type="text" class="form-control" id="namalengkap" name="namalengkap">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                        <input value="<?php echo $phs->no_telp; ?>" type="tel" class="form-control" id="notelp" name="notelp">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Nomor Telepon Kerabat</label>
                        <input value="<?php echo $phs->telp_kerabat; ?>" type="tel" class="form-control" id="notelpkerabat" name="notelpkerabat">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Asal Kota</label>
                        <input value="<?php echo $phs->asal_kota; ?>" type="text" class="form-control" id="asalkota" name="asalkota">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">status</label>
                        <input value="<?php echo $phs->status; ?>" type="text" class="form-control" id="status" name="status">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">NIK</label>
                        <input value="<?php echo $phs->NIK; ?>" type="text" class="form-control" id="nik" name="nik">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="formFile" class="form-label">Foto KTP</label>
                        <input class="form-control" type="file" id="formFile" name="userfile[]">
                    </div>
                    <div class="mb-3 col-md-6">
                        <br>
                        <a class="btn btn-primary col-md-12 mt-2" href="<?php echo base_url('profile/edit_password/' . $id) ?>">Edit Password</a>
                    </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-12">
                        <br>
                        <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
                    </div>
                    
                </form>
                </div>

                <!-- Form -->
                
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
<!-- End Details -->

<script>
    // Tampilkan alert jika ada pesan
    var alertMessage = '<?php echo $this->session->flashdata('update_pass'); ?>';
    if (alertMessage !== '') {
        $('.alert').alert();
    }
</script>

<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
