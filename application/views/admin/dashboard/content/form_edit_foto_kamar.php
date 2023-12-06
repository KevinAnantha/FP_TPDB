<div class="row ml-2 mt-4">
<h1>Update <b>Foto Kamar</b></h1>
    <form action="<?php echo base_url('admin/aksi_edit_foto_kamar/' . $id_foto . '/' . $id_kamar)?>" method="POST" enctype="multipart/form-data">
        <br>
        <div class="mb-3 col-md-6">
            <label for="formFile" class="form-label">Foto Kamar</label>
            <input class="form-control" type="file" id="formFile" name="userfile[]">
        </div>

        <div class="col-md-12">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
