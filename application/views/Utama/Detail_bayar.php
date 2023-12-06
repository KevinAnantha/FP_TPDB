<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Muslim</title>
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-1aqZEcu1m1fHIlxo"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
            <div class="col-md-6 mx-auto">
                <div class="mb-5 box_detail p-5" style="width:auto; height:auto;">
                    <div class="row">
                    <h2><b>Rincian Pesanan</b></h2>
                    <h5 class="mt-2">Kamar Nomor : <?php echo $no_kmr; ?></h5>
                    <h5>Posisi : <?php echo urldecode($lantai); ?></h5>

                        <div><form id="payment-form" method="post" action="<?=site_url()?>/snap/finish/<?php echo $id_kmr ?>">
                            <input type="hidden" name="result_type" id="result-type" value=""></div>
                            <input type="hidden" name="result_data" id="result-data" value=""></div>
                            <label class="mt-4" for="periode"><b>Pilih Periode sewa (dalam bulan)</b></label>
                            <input class="form-control" type="number" value="1" name="periode" id="periode" placeholder="1">

                            <!-- data user -->
                            <?php $id_user = $this->session->userdata('id_user'); 
                            $username = $this->session->userdata('username');  ?>
                            <input hidden type="text" id="nomor_kamar" name="nomor_kamar" value="<?php echo $no_kmr; ?>">
                            <input hidden type="text" id="lantai" name="lantai" value="<?php echo urldecode($lantai); ?>">
                            <input hidden type="text" id="id_user" name="id_user" value="<?php echo $id_user; ?>">
                            <input hidden type="text" id="username" name="username" value="<?php echo $username; ?>">
                            <input hidden type="text" id="harga" name="harga" value="<?php echo $harga; ?>">
                            <input hidden type="text" id="email" name="email" value="<?php echo $email; ?>">
                            <input hidden type="text" id="no_telp" name="no_telp" value="<?php echo $no_telp; ?>">
                            <button class="btn btn-primary mt-4" id="pay-button">Bayar</button>
                        </form>
                    </div>
                        
                        
                            
                    </div>
                </div>
            </div>
    </div>
</div>

    <!-- End Details -->
    
    

<script src="<?php echo base_url()?>css/bootstrap/js/bootstrap.bundle.min.js"></script>   
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<script type="text/javascript">
  
  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");

    var periode = $("#periode").val();
    var nomor_kamar = $("#nomor_kamar").val();
    var lantai = $("#lantai").val();
    var id_user = $("#id_user").val();
    var username = $("#username").val();
    var harga = $("#harga").val();
    var email = $("#email").val();
    var no_telp = $("#no_telp").val();


  
  $.ajax({
    type : 'POST',
    url: '<?=site_url()?>/snap/token',
    data : {periode:periode,nomor_kamar:nomor_kamar,id_user:id_user,username:username,harga:harga,email:email,no_telp:no_telp},
    cache: false,

    success: function(data) {
      //location = data;

      console.log('token = '+data);
      
      var resultType = document.getElementById('result-type');
      var resultData = document.getElementById('result-data');

      function changeResult(type,data){
        $("#result-type").val(type);
        $("#result-data").val(JSON.stringify(data));
        //resultType.innerHTML = type;
        //resultData.innerHTML = JSON.stringify(data);
      }

      snap.pay(data, {
        
        onSuccess: function(result){
          changeResult('success', result);
          console.log(result.status_message);
          console.log(result);
          $("#payment-form").submit();
        },
        onPending: function(result){
          changeResult('pending', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        },
        onError: function(result){
          changeResult('error', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        }
      });
    }
  });
});

</script>
</body>
</html>