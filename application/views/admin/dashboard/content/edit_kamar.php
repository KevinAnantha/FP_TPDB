<div class="row ml-2 pt-4">
    <h1>Edit <b>Kamar</b></h1>
    <form action="<?php echo base_url()?>admin/aksi_update_kamar/<?php echo $id ?>" method="POST">
    <?php foreach($ph as $phs){ ?>
        <br>
        <div class="mb-3 col-md-6">
            <label for="exampleInputEmail1" class="form-label">Nomor Kamar</label>
            <input value="<?php echo $phs->no_kmr; ?>" type="text" class="form-control" id="username" name="nomor" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Posisi</label>
            <input value="<?php echo $phs->posisi; ?>" type="text" class="form-control" id="email" name="posisi">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Ukuran Kamar</label>
            <input value="<?php echo $phs->ukuran; ?>" type="text" class="form-control" id="password" name="ukuran">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Kamar Mandi</label>
            <input value="<?php echo $phs->KM; ?>" type="text" class="form-control" id="namalengkap" name="kamarmandi">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Furnished (ya/tidak)</label>
            <input value="<?php echo $phs->furnished; ?>" type="text" class="form-control" id="notelp" name="furnised">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input value="<?php echo $phs->harga; ?>" type="text" class="form-control" id="asalkota" name="harga">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">id_penghuni</label>
            <input value="<?php echo $phs->id_penghuni; ?>" type="text" class="form-control" id="status" name="idpenghuni">
        </div>

        <div class="col-md-12">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <?php } ?>
    </form>
</div>
