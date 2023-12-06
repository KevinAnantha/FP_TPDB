<div class="row ml-2 mt-4">
<h1>Tambah <b>Kamar</b></h1>
    <form action="<?php echo base_url()?>Admin/aksi_tambah_kamar" method="POST" enctype="multipart/form-data">
        <br>
        <div class="mb-3 col-md-6">
            <label for="exampleInputEmail1" class="form-label">Nomor Kamar</label>
            <input  type="text" class="form-control" id="username" name="nomor" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Posisi</label>
            <input  type="text" class="form-control" id="email" name="posisi">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Ukuran Kamar</label>
            <input  type="text" class="form-control" id="password" name="ukuran">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Kamar Mandi</label>
            <input  type="text" class="form-control" id="namalengkap" name="kamarmandi">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Furnished (ya/tidak)</label>
            <input  type="text" class="form-control" id="notelp" name="furnised">
        </div>
        <div class="mb-3 col-md-6">
            <label for="formFile" class="form-label">Foto Kamar</label>
            <input class="form-control" type="file" id="formFile" name="userfile[]" multiple>
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input  type="text" class="form-control" id="asalkota" name="harga">
        </div>


        <div class="col-md-12">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
