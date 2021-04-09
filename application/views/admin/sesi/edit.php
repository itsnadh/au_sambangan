<?php
	$this->load->view('admin/head.php');
	$this->load->view('admin/side.php');
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
          <div class="row">
			<div class="container">
				<h3>Ubah Sesi</h3>
				<?php        
					$attr = array('class'=>'horizontal-form', 'onClick'=>'validasi();');
					echo form_open(base_url() . 'index.php/admin/post_sesi/' . $data->id);
				?>
					<div class="row">
						<div class="form-group col-4">
							<label for="tanggal" class="form-label">Tanggal</label>
							<input required type="date" name="tanggal" value="<?php echo $data->tanggal ?>" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label for="jam_mulai" class="form-label">Jam Mulai</label>
							<input required type="time" name="jam_mulai" value="<?php echo $data->jam_mulai ?>" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label for="jam_selesai" class="form-label">Jam Selesai</label>
							<input required type="time" name="jam_selesai" value="<?php echo $data->jam_selesai ?>" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label for="kuota" class="form-label">Kuota</label>
							<input required type="number" name="kuota" value="<?php echo $data->kuota ?>" class="form-control" min="1">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4">
							<label for="gender" class="form-label">Gender</label>
							<select required name="gender" class="form-control">
								<option disabled>-- Pilih Gender --</option>
								<option value="L" <?php echo ($data->gender == "L"? "selected":"") ?>>Laki-laki</option>
								<option value="P" <?php echo ($data->gender == "P"? "selected":"") ?>>Perempuan</option>
							</select>
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
	$this->load->view('admin/foot.php');
?>
