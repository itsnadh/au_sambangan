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
							<th>Time stamp</th>
							<th>Pembatalan</th>
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
								<a href="#">
									<button class="btn btn-xs btn-info" value="#" style="background-color: #F54747; border:none">Batalkan</button>
								</a>
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
