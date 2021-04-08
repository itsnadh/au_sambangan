<?php 
	$this->load->view("fe/head");
?>

<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
			    <h2>Selamat Datang, <b>Wali santri <?php echo $_SESSION['nama_santri'] ?></b></h2>
			</div>
		</div>              
		
		<!-- /. ROW  -->
		<hr />

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">                     
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>ISI FORMULIR</b>
                    </div>
                    <div class="panel-body">
                        <div id="morris-bar-chart">
                        	<h4>Silahkan isi formulir pada <a href="<?php echo base_url(); ?>index.php/user/register">link berikut</a></h4>

                        </div>
                    </div>
                </div>            
            </div>
		</div>
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">                     
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Konfirmasi Sambangan</b>
                    </div>
                    <div class="panel-body">
						<?php 
							if($this->session->flashdata('failed') == TRUE){
						?>
							<div class="row" style="margin-bottom: 1rem;">
								<div class="col-md-6 col-md-offset-3 text-center">
									<div class="bg-warning"><?php print_r($this->session->flashdata('failed')) ?></div>
								</div>
							</div>
						<?php 
							}
						?>
                        <div id="morris-bar-chart">
                        	<div class="table-responsive">
                        	    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            	    <thead>
                            	        <tr>
                            	            <th>No</th>
                            	            <th>Nama Santri</th>
                            	            <th>Nama Walisantri</th>
                            	            <th>Kelas Santri</th>
                            	            <th>Sesi Sambangan</th>
                            	            <th>Aksi</th>
                            	        </tr>
                            	    </thead>
                            	    <tbody>
                            	        <?php
                                            $no = 1;
                                            foreach ($log as $a) {
                                                
                                          ?>
                            	        <tr>
                            	            <td><?php echo $no ?></td>
                            	            <td><?php echo $_SESSION['nama_santri'] ?></td>
                            	            <td><?php echo $_SESSION['nama_walisantri'] ?></td>
                            	            <td><?php echo $_SESSION['kelas_santri'] ?></td>
                            	            <td><?php echo ($a->tanggal . ' ' . $a->jam_mulai . '-' . $a->jam_selesai) ?></td>
                            	            <td>
                            	                <a href="<?php echo base_url().'index.php/user/hapus/' . $a->id; ?>">
                            	                    <button class="btn btn-xs btn-info" value="#" style="background-color: #F54747; border:none">Batalkan</button>
                                                </a>
                            	                <a href="#">
                            	                    <button class="btn btn-xs btn-info" value="#" style="background-color: #29BF5B; border:none">Certak Kartu</button>
                                                </a>
                                            </td>
                            	            <?php $no++ ?>
                            	        </tr>
                            	        <?php } ?>
                            	    </tbody>
                        	    </table>
                        	</div>
                        </div>
                    </div>
                </div>            
            </div>
		</div> 
		
		
        <!-- /. ROW  -->           
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->

<?php
	$this->load->view("fe/foot");
?>
	