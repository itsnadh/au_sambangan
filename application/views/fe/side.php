<?php 
    $dt = $this->uri->segment(2);

?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <?php
                        //echo $log['no_peserta'];
                        
                        if (False) {
                            
                        }else{
                    ?>
                            <img src="<?php echo base_url().'assets/user';?>/img/find_user.png" class="user-image img-responsive"/>
                    <?php
                        }
                    ?>
                    
					</li>
                    <li>
                        <a <?php if ($dt=='' || $dt=='index') {echo "class='active-menu'";} ?>  href="<?php echo base_url().'user/index'; ?>"><i class="fa fa-home fa-2x"></i>Dashboard</a>
                    </li>
        <!--            <li>-->
        <!--                <a <?php if ($dt=='prosedur') {echo "class='active-menu'";} ?>  href="<?php echo base_url().'user/prosedur'; ?>"><i class="fa fa-list fa-2x"></i>Prosedur Pendaftaran</a>-->
        <!--            </li>-->
        <!--            <li>-->
        <!--                <a <?php if ($dt=='biodata') {echo "class='active-menu'";} ?>  href="<?php echo base_url().'user/biodata'; ?>"><i class="fa fa-user fa-2x"></i>  Biodata</a>-->
        <!--            </li>-->
        <!--             <li>-->
        <!--                <a <?php if ($dt=='bukti') {echo "class='active-menu'";} ?>  href="<?php echo base_url().'user/bukti'; ?>"><i class="fa fa-barcode fa-2x"></i>Biaya Pendaftaran</a>-->
        <!--            </li>-->
        <!--            <?php if ($this->session->userdata('program')=="CIT" || $this->session->userdata('program')=="EXCT") { ?>-->
        <!--            <li>-->
        <!--                <a <?php if ($dt=='data_pendukung') {echo "class='active-menu'";} ?> href="<?php echo base_url().'user/data_pendukung'; ?>"><i class="fa fa-upload fa-2x"></i> Upload Data Pendukung</a>-->
        <!--            </li>-->
        <!--            <?php } ?>-->
                    <!--<li>-->
                    <!--    <a <?php if ($dt=='kartu') {echo "class='active-menu'";} ?> href="<?php echo base_url().'user/kartu'; ?>"><i class="fa fa-print fa-2x"></i> Cetak Kartu</a>-->
                    <!--</li>-->

				    <!--<li  >-->
        <!--                <a  <?php if ($dt=='password') {echo "class='active-menu'";} ?> href="<?php echo base_url().'user/password'; ?>"><i class="fa fa-edit fa-2x"></i> Ganti Password</a>-->
        <!--            </li>	-->
                </ul>
               
            </div>
            
        </nav>  