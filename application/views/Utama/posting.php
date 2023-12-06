<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posting</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/Utama/Posting.css">
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

    <!-- Posting box -->
    
    <div class="container">
        <div class="row bg-warning mt-4 ms-4 me-4 p-4 box_post mb-4">
            <div class="inputan col-8">
                <form action="<?php echo base_url()?>posting/aksi_posting" method="POST">
                    <h2 class="fw-bolder mt-3">Post Project</h2>
                    <br>
                    <label>Kategori</label>
                    <br>
                    <select class="form-select mt-2"  name="kategori" >
                        <option class="text-secondary" value="" disabled selected>Pilih kategori project</option>
                        <?php foreach ($options as $option): ?>
                        <option value="<?php echo $option['kategori']; ?>"><?php echo $option['kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label>Judul</label>
                    <br>
                    <input class="form-control mt-2" type="text-area" name="judul" id="">
                    <br>
                    <label>Keterangan Singkat</label>
                    <br>
                    <input class="form-control mt-2" type="text-area" name="ket_singkat" id="">
                    <br>
                    <label>Keterangan Lengkap</label>
                    <br>
                    <textarea class="form-control mt-2" name="ket_lengkap" id="" cols="30" rows="10"></textarea>
                    <br>
                    <label>budget</label>
                    <br>
                    <input class="form-control mt-2" type="text" name="budget" id="">
                    <br>
                    <label>Deadline</label>
                    <br>
                    <input class="form-control mt-2" type="date" name="deadline" id="">
                    <br>
                    <label>Telepon</label>
                    <br>
                    <input class="form-control mt-2" type="text" name="hp" id="">
                    <br>
                    <div class="button_div mt-4 mb-4">
                        <button type="submit" class="fw-bolder btn btn-primary ps-3 pe-3">POST</button>
                    </div>

                    <?php echo $this->session->userdata('username')?>

                </form>
            </div>
        </div>
    </div>
    <br>
    <br>


    <!-- end posting box -->



<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>   
</body>
</html>