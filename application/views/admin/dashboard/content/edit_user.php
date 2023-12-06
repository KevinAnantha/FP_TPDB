<div class="row ml-2 pt-4">
<h1>Edit <b>User</b></h1>

    <?php if ($this->session->flashdata('success_admin')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('success_admin'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <form action="<?php echo base_url()?>Admin/update_user/<?php echo $id ?>" method="POST" enctype="multipart/form-data">
    <?php foreach($ph as $phs){ ?>
        <br>
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
            <a class="btn btn-primary col-md-12 mt-2" href="<?php echo base_url('admin/edit_password/' . $id) ?>">Edit Password</a>
        </div>

        <div class="col-md-12">
            <br>
            <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
        </div>
        <?php } ?>
    </form>
</div>


