
	<div class="fly-in-up">
	<div class="table-responsive">
	    
	    <?php if ($this->session->flashdata('success_admin')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success_admin'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Kelola <b>Kamar</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo base_url()?>admin/tambah_kamar" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Tambah Kamar</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>NO</th>
						<th>Nomor Kamar</th>
						<th>Posisi</th>
						<th>Ukuran</th>
						<th>Kamar Mandi</th>
						<th>Furniture</th>
                        <th>Harga</th>
						<th>ID_Penghuni</th>
						<th>Aksi</th>
						<th>Foto</th>


					</tr>
				</thead>
				<tbody>
					<?php $counter = 1; ?>
					<?php foreach($info as $row) { ?>
                        <tr>
							<td><?php echo $counter; ?></td>
                            <td><?php echo $row->no_kmr; ?></td>
                            <td><?php echo $row->posisi; ?></td>
                            <td><?php echo $row->ukuran; ?></td>
                            <td><?php echo $row->KM; ?></td>
                            <td><?php echo $row->furnished; ?></td>
                            <td><?php echo $row->harga; ?></td>
                            <td><?php echo $row->id_penghuni; ?></td>
                            <td><a style="color:white;" class="btn btn-danger" href="<?php echo base_url('admin/reset_penghuni/' . $row->id_kmr) ?>">Hapus Penghuni</a></td>
							<td><a href="<?php echo base_url()?>Admin/edit_foto_kamar/<?php echo $row->id_kmr ?>" class="btn btn-warning" style="color:white;">Edit Foto</a></td>
                            <td>
                                <a href="<?php echo base_url()?>admin/edit_kamar/<?php echo $row->id_kmr ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="<?php echo $row->id_kmr; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
						<?php $counter++; ?>
                    <?php } ?>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Hapus Kamar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Apakah anda yakin ingin menghapus kamar ini?</p>
					<p class="text-warning"><small>Aksi ini tidak bisa dipulihkan.</small></p>
				</div>
				<div class="modal-footer">
				<input type="hidden" name="id_kmr_delete" value="">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <a href="#" class="btn btn-danger" style="">Hapus</a>
				</div>
			</form>
		</div>
	</div>
	</div>


	<script>
		$(document).ready(function(){
    $('.delete').click(function(){
        var id_kmr = $(this).data('id');
        var deleteUrl = "<?php echo base_url()?>admin/delete_kamar/" + id_kmr;
        $('#deleteEmployeeModal').find('.modal-footer a.btn-danger').attr('href', deleteUrl);
    });
});




	</script>

	<!-- Di bagian bawah HTML Anda, tambahkan script berikut -->
	<!-- <script>
$(document).ready(function() {
    var itemsPerPage = 10;
    var $rows = $('.table tbody tr');
    var slideIndex = 0;
    var totalSlides = Math.ceil($rows.length / itemsPerPage);

    function showSlide(index) {
        var start = index * itemsPerPage;
        var end = start + itemsPerPage;
        $rows.hide().slice(start, end).show();
    }

    showSlide(slideIndex);

    $('.pagination li').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        if ($this.hasClass('disabled') || $this.hasClass('active')) return;

        if ($this.text() === 'Previous') {
            slideIndex--;
        } else if ($this.text() === 'Next') {
            slideIndex++;
        } else {
            slideIndex = parseInt($this.text()) - 1;
        }

        $('.pagination li').removeClass('active');
        if (slideIndex === 0) {
            $('.pagination li:first-child').addClass('disabled');
        } else {
            $('.pagination li:first-child').removeClass('disabled');
        }
        if (slideIndex === totalSlides - 1) {
            $('.pagination li:last-child').addClass('disabled');
        } else {
            $('.pagination li:last-child').removeClass('disabled');
        }

        showSlide(slideIndex);
        $this.addClass('active');
    });
});
</script>



 -->
