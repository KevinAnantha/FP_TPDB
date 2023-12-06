<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pemesanan</title>
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
     <!-- Details -->
     <div class="container mt-5">
    <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="mb-5 box_detail p-5" style="width:auto; height:auto;">
                    <div class="row">
                    <div class="table-responsive">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>History <b>Pemesanan</b></h2>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order_id</th>
                                            <th>Nominal</th>
                                            <th>Mode Pembayaran</th>
                                            <th>Waktu Transaksi</th>
                                            <th>Bank</th>
                                            <th>VA Number</th>
                                            <th>Status</th>
                                            <th>Bayar</th>
                                            <th>Status Sewa</th>
                                            <th>id kamar</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($history as $row2) {?>
                                            <tr>
                                                <td><?php echo $row2->order_id; ?></td>
                                                
                                                <td>Rp. <?php echo number_format($row2->gross_amount, 0, ',', '.'); ?></td>
                                                <td><?php echo $row2->payment_type; ?></td>
                                                <td><?php echo $row2->transaction_time; ?></td>
                                                <td><?php echo $row2->bank; ?></td>
                                                <td><?php echo $row2->va_number; ?></td>
                                                <td>
                                                    <?php 
                                                    if($row2->status_code == "200"){ ?>
                                                        <a style="pointer-events: none; color:white;" class="btn btn-success" style="color:white;">Berhasil</a>
                                                    <?php }elseif($row2->status_code == "202"){ ?>
                                                        <a style="pointer-events: none; color:white;" class="btn btn-danger" style="color:white;">Gagal</a>
                                                    <?php }else { ?>
                                                        <a style="pointer-events: none" class="btn btn-warning">Pending</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    if($row2->status_code == "200"){ ?>
                                                        <a style="pointer-events: none; color:white;" class="btn btn-success" style="color:white;">Lunas</a>
                                                    <?php }elseif($row2->status_code == "202"){ ?>
                                                        <a style="pointer-events: none; color:white;" class="btn btn-danger" style="color:white;">Gagal</a>
                                                    <?php }else { ?>
                                                        <a class="btn btn-primary" href="<?php echo $row2->pdf_url; ?>">Bayar</a>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php 
                                                    if($row2->status_sewa == "aktif"){ ?>
                                                        <a style="pointer-events: none; color:white;" class="btn btn-success" style="color:white;">Aktif</a>
                                                    <?php } elseif($row2->status_sewa == "Booking in Progress"){ ?>
                                                    <a style="pointer-events: none; color:white;" class="btn btn-warning" style="color:white;">Booking...</a>
                                                    <?php }else { ?>
                                                        <a style="pointer-events: none; color:white;" class="btn btn-danger" href="<?php echo $row2->pdf_url; ?>">Expired</a>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $row2->id_kmr; ?></td>

                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
              
                            
                    </div>
                </div>
            </div>
    </div>
</div>

    <!-- End Details -->
    
    

<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>