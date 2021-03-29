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
                  <h1>Hallo</h1>
                  <div class="table-responsive">
                        	    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            	    <thead>
                            	        <tr>
                            	            <th>No</th>
                            	            <th>Nama Santri</th>
                            	            <th>Nama Walisantri</th>
                            	            <th>Kelas Santri</th>
                            	            <th>Sesi Sambangan</th>
                            	            <th>Time stamp</th>
                            	            <th>Tanggal</th>
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
                            	            <td><?php echo $a->created_at?></td>
                            	            <td></td>
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