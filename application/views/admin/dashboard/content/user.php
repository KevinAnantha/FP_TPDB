
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
						<h2>Kelola <b>User</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo base_url()?>admin/tambah_user" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Tambah User</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Nama Lengkap</th>
                        <th>Email</th>
						<th>No Telp</th>
						<th>No Telp Kerabat</th>
						<th>Asal</th>
                        <th>Status</th>
                        <th>NIK</th>
						<th>KTP</th>


					</tr>
				</thead>
				<tbody>
					<?php $counter = 1; ?>
					<?php foreach($info as $row) { ?>
                        <tr>
							<td><?php echo $counter; ?></td>
                            <td><?php echo $row->id_penghuni; ?></td>
                            <td><?php echo $row->nama_lengkap; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->no_telp; ?></td>
                            <td><?php echo $row->telp_kerabat; ?></td>
                            <td><?php echo $row->asal_kota; ?></td>
                            <td><?php echo $row->status; ?></td>
                            <td><?php echo $row->NIK; ?></td>
                            <td>
								<a href="<?php echo base_url($row->pic_ktp)?>" target="_blank">
        							<img src="<?php echo base_url($row->pic_ktp)?>" alt="" style="max-width: 100%; max-height: 100%;">
    							</a>
							</td>
                            <td>
                                <a href="<?php echo site_url('admin/edit_user/' . $row->id_penghuni) ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="<?php echo $row->id_penghuni; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
					<h4 class="modal-title">Hapus User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Apakah anda yakin ingin menghapus user ini?</p>
					<p class="text-warning"><small>Aksi ini tidak bisa dipulihkan.</small></p>
					<input type="hidden" name="delete_id" value="">
				</div>
				<div class="modal-footer">
				<input type="hidden" name="id_kmr_delete" value="">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <a href="#" class="btn btn-danger" style="">Hapus</a>
				</div>
			</form>
		</div>
	</div>

	<script>
		$(document).ready(function(){
    $('.delete').click(function(){
        var id_penghuni = $(this).data('id');
        var deleteUrl = "<?php echo base_url()?>admin/delete_user/" + id_penghuni;
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
