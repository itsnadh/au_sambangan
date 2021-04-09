<?php
	$this->load->view('admin/head');
	$this->load->view('admin/side');
	?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
          </ol>
            
		<!-- Icon Cards-->
		<div class="row">
			<div class="container">
				<h4><a href="<?php echo base_url(); ?>index.php/admin/create_sesi">Buat sesi</a></h4>
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Jadwal Sesi</th>
								<th>Gender</th>
								<th>Kuota</th>
								<th>Sisa</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 0;
								foreach ($sesi as $a) {
									$no++;
								?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo ($a->tanggal . ' ' . $a->jam_mulai . '-' . $a->jam_selesai) ?></td>
								<td><?php echo $a->gender == "P" ? "Perempuan" : "Laki-laki" ?></td>
								<td><?php echo $a->kuota ?></td>
								<td><?php echo $a->kuota - $a->used ?></td>
								<td>
									<a href="<?php echo base_url().'index.php/admin/edit_sesi/' . $a->id; ?>">
										<button class="btn btn-xs btn-info">Edit</button>
									</a>
									<a href="<?php echo base_url().'index.php/admin/hapus_sesi/' . $a->id; ?>">
										<button class="btn btn-xs btn-danger">Hapus</button>
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
              	</div>
          	</div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- DataTable -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>
        <!-- /.container-fluid -->

<?php
	$this->load->view('admin/foot');
?>
