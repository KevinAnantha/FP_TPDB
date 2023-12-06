<div class="row ml-2 mt-4">
<h1>Tambah <b>User</b></h1>

    <?php if ($this->session->flashdata('error_username')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('error_username'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <form action="<?php echo base_url()?>Admin/aksi_tambah_user" method="POST" enctype="multipart/form-data">
        <br>
        <div class="mb-3 col-md-6">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input  type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input  type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input  type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
            <input  type="text" class="form-control" id="namalengkap" name="namalengkap">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
            <input  type="tel" class="form-control" id="notelp" name="notelp">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Nomor Telepon Kerabat</label>
            <input  type="tel" class="form-control" id="notelpkerabat" name="notelpkerabat">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Asal Kota</label>
            <input  type="text" class="form-control" id="asalkota" name="asalkota">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">status</label>
            <input  type="text" class="form-control" id="status" name="status">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">NIK</label>
            <input  type="text" class="form-control" id="nik" name="nik">
        </div>
        <div class="mb-3 col-md-6">
            <label for="formFile" class="form-label">Foto KTP</label>
            <input class="form-control" type="file" id="formFile" name="userfile">
        </div>

        <div class="col-md-12">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
