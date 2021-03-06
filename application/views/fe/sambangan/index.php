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
                        <b>ISI FORMULIR REGISTRASI SAMBANGAN</b>
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
                            	            <th>Status</th>
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
												<?php if(time() < strtotime($a->tanggal . ' ' . $a->jam_selesai)): ?>
													<a onclick="deleteSambangan(<?php echo $a->id ?>)" href="#">
														<button class="btn btn-xs btn-info" value="#" style="background-color: #F54747; border:none">Batalkan</button>
													</a>
													<?php if(((int) $a->status) == 1): ?>
														<a href="<?php echo base_url() . 'index.php/user/cetak/' . $a->id; ?>">
															<button class="btn btn-xs btn-info" value="#" style="background-color: #29BF5B; border:none">Cetak Kartu</button>
														</a>
													<?php endif; ?>
												<?php else: ?> -
												<?php endif; ?>
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

<script type="text/javascript">
	function deleteSambangan(id){
		const del = confirm("Apakah anda yakin?")
		if (del)
			window.location = '<?php echo base_url().'index.php/user/hapus/'; ?>' + id
	}
</script>
