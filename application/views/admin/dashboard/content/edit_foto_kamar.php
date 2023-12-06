
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
						<h2>Edit <b>Foto Kamar</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo base_url('admin/tambah_foto_kamar/' . $id_kamar)?>" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Tambah Foto</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>NO</th>
						<th>Foto</th>
                        <th>Edit</th>

					</tr>
				</thead>
				<tbody>
					<?php $counter = 1; ?>
					<?php foreach($foto as $row) { ?>
                        <tr>
							<td><?php echo $counter; ?></td>
                            <td>
								<a href="<?php echo base_url($row->picture)?>" target="_blank">
        							<img src="<?php echo base_url($row->picture)?>" alt="" style="max-width: 50%; max-height: 50%;">
    							</a>
							</td>
                            <td>
                                
                                <a href="<?php echo site_url('admin/form_update_foto_kamar/' . $row->id_pic . '/' . $id_kamar) ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="<?php echo $row->id_pic; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Hapus Foto Kamar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Apakah anda yakin ingin menghapus foto kamar ini?</p>
					<p class="text-warning"><small>Aksi ini tidak bisa dipulihkan.</small></p>
					<input type="hidden" name="delete_id" value="">
				</div>
				<div class="modal-footer">
				<input type="hidden" name="id_kmr_delete" value="">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <a href="#" class="btn btn-danger" style="">Delete</a>
				</div>
			</form>
		</div>
	</div>

	<script>
        $(document).ready(function(){
    $('.delete').click(function(){
        var id_pic = $(this).data('id');
        var otherParam = <?php echo $id_kamar ?>; // Nilai parameter kedua
        var deleteUrl = "<?php echo base_url()?>admin/delete_foto_kamar/" + id_pic + "/" + otherParam;
        $('#deleteEmployeeModal').find('.modal-footer a.btn-danger').attr('href', deleteUrl);
    });
});

    </script>
