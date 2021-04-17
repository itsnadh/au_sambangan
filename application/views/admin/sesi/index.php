<?php
	$this->load->view('admin/head');
	$this->load->view('admin/side');
	?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Sesi</a>
            </li>
          </ol>
            
		<!-- Icon Cards-->
		<div class="row mb-2">
			<div class="col-6">	
		  		<h2>Daftar Sesi</h2>
				<a href="<?php echo base_url(); ?>index.php/admin/create_sesi" class="btn btn-success float-left">Buat sesi</a>
			</div>
			<div class="col-6">
				<!-- <a href="<?php echo base_url(); ?>index.php/admin/create_sesi" class="btn btn-primary float-left">Buat sesi</a> -->
			</div>
		</div>
		<div class="row">
			<div class="table-responsive col-12">
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
									<button class="btn btn-xs btn-info">Ubah</button>
								</a>
								<a href="#" onclick="deleteSesi('<?php echo $a->id ?>')">
									<button class="btn btn-xs btn-danger">Hapus</button>
								</a>
							</td>
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
        <script type="text/javascript">
			function deleteSesi(id){
				const del = confirm("Apakah anda yakin?")
				if (del)
					window.location = '<?php echo base_url().'index.php/admin/hapus_sesi/'; ?>' + id
			}
		</script>
        <!-- /.container-fluid -->

<?php
	$this->load->view('admin/foot');
?>
