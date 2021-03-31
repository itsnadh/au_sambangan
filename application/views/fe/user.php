<?php 
	include "head.php";
?>

<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
			    <h2>Selamat Datang, <b>Wali santri <?php echo $bio['nama_santri'] ?></b></h2>
				<!--<h2>Selamat Datang, <b><?php echo $bio['nama']; ?></b></h2>   -->
				<!--<h5>anda login sebagai : <strong><?php echo $bio['nama']; ?></strong></h5>-->
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
                            	            <th>Pembatalan</th>
                            	            <th>Cetak Kartu</th>
                            	        </tr>
                            	    </thead>
                            	    <tbody>
                            	        <?php
                                            $no = 1;
                                            foreach ($log as $a) {
                                                
                                          ?>
                            	        <tr>
                            	            <td><?php echo $no ?></td>
                            	            <td><?php echo $a->nama_santri?></td>
                            	            <td><?php echo $a->nama_walisantri?></td>
                            	            <td><?php echo $a->kelas_santri?></td>
                            	            <td>
                            	                <?php 
                            	                    if ($a->sesi == "sesi_1")
                            	                    {
                            	                        echo "sesi 1 (08.00-08.20)";    
                            	                    }
                            	                    else if ($a->sesi =="sesi_2")
                            	                    {
                            	                        echo "sesi 2 (09.00-09.20)";
                            	                    }
                            	                    else if ($a->sesi =="sesi_3")
                            	                    {
                            	                        echo "sesi 3 (10.00-10.20)";
                            	                    }
                            	                    else if ($a->sesi =="sesi_4")
                            	                    {
                            	                        echo "sesi 4 (11.00-11.20)";
                            	                    }
                            	                    else if ($a->sesi =="sesi_5")
                            	                    {
                            	                        echo "sesi 5 (13.00-13.20)";
                            	                    }else if ($a->sesi =="sesi_6")
                            	                    {
                            	                        echo "sesi 6 (14.00-14.20)";
                            	                    }
                            	                    else if ($a->sesi =="sesi_7")
                            	                    {
                            	                        echo "sesi 2 (15.00-15.20)";
                            	                    }
                            	                ?>
                            	            </td>
                            	            <td></td>
                            	            <td>
                            	                <a href="#">
                            	                    <button class="btn btn-xs btn-info" value="#" style="background-color: #F54747; border:none">Batalkan</button>
                                                </a>
                                            </td>
                            	            <td>
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
                        	<h4></h4>

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
	include "foot.php";
?>
	