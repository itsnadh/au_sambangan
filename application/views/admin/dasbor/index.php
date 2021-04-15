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
			<div class="table-responsive col-12">
		  		<h2 class="mb-3">Daftar Sambangan</h2>
				<table id="example" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Santri</th>
							<th>Nama Walisantri</th>
							<th>Kelas Santri</th>
							<th>Sesi Sambangan</th>
							<th>Timestamp</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							foreach ($siswa as $a) {
								
							?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $a->nama_santri?></td>
							<td><?php echo $a->nama_walisantri?></td>
							<td><?php echo $a->kelas_santri?></td>
							<td><?php echo ($a->tanggal . ' ' . $a->jam_mulai . '-' . $a->jam_selesai) ?></td>
							<td><?php echo $a->created_at ?></td>
							<td>
								<?php
								if(time() > strtotime($a->tanggal . ' ' . $a->jam_selesai)):
									echo "Selesai";
								else:
									switch ((string) $a->status) {
										case '0':
											echo "Diajukan";
											break;

										case '1':
											echo "OK";
											break;

										case '2':
											echo "Ditolak";
											break;
									}
								endif;
								?>
							</td>
							<td>
								<?php
									if(!((int) $a->status)):?>
										<a href="<?php echo base_url() . 'index.php/admin/update_status_sambangan/' . $a->id . '/2'; ?>" class="btn btn-xs btn-danger">Tolak</a>
										<a href="<?php echo base_url() . 'index.php/admin/update_status_sambangan/' . $a->id . '/1'; ?>" class="btn btn-xs btn-success">Terima</a>
								<?php else: echo "-"; ?>
								<?php endif; ?>
							</td>
							
							<?php $no++ ?>
						</tr>
						<?php } ?>
					</tbody>
				</table>
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
