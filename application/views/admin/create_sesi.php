<?php
	include 'head.php';
	include 'side.php';
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
				<h3>Create Sesi</h3>
				<?php        
					$attr = array('class'=>'horizontal-form', 'onClick'=>'validasi();');
					echo form_open(base_url().'index.php/admin/post_sesi');
				?>
					<div class="row">
						<div class="form-group col-4">
							<label for="tanggal" class="form-label">Tanggal</label>
							<input type="date" name="tanggal" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label for="jam_mulai" class="form-label">Jam Mulai</label>
							<input type="time" name="jam_mulai" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label for="jam_selesai" class="form-label">Jam Selesai</label>
							<input type="time" name="jam_selesai" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label for="kuota" class="form-label">Kuota</label>
							<input type="number" name="kuota" class="form-control" min="1">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
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
	include 'foot.php';
?>
