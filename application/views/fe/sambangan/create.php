<html>
<head>
<title>FORMULIR | SAMBANGAN</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url()."assets/bootstrap.min.css"; ?>" rel="stylesheet" id="bootstrap-css">
<link href="<?php echo base_url()."assets/new.css"; ?>" rel="stylesheet" id="bootstrap-css">
<link rel="icon" href="<?php echo base_url('assets/logo.png'); ?>">
<link href="<?php echo base_url()."assets/main.css"; ?>" rel="stylesheet">
<script src="<?php echo base_url()."assets/jquery.min.js";?>"></script>

<style type="text/css">
/*.pre-scrollable {*/
/*    max-height: 460px;*/
/*    overflow-y: scroll;*/
/*}*/
</style>

</head>
<body>


<div class="container register">
    <div class="row">

        <div class="col-lg-12  col-sm-12 register-right">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Formulir Pendaftaran Sambangan MAI Amanatul Ummah</h3>
                        <div class="row register-form">
                            <div class="col-sm-12" >
                                <div class="">
                                <?php
                                    $attr = array('class'=>'horizontal-form');
                                    echo form_open(base_url().'index.php/user/registration', $attr);
                                ?>
                                    <br/>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label" style="text-align: right;">Nama Lengkap Wali Santri</label>
                                            <div class="col-sm-8">
												<?php echo $_SESSION['nama_walisantri']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label" style="text-align: right;">Nama Lengkap Santri</label>
                                            <div class="col-sm-8">
												<?php echo $_SESSION['nama_santri']; ?>
											</div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom: 0;">
                                            <label for="program" class="col-sm-3 col-form-label" style="text-align: right; font-size: 15pt;">Kelas</label>
                                            <div class="col-sm-8 maxl">
												<?php echo $_SESSION['kelas_santri']; ?>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group row" style="margin-bottom: 0;">
                                            <label for="program" class="col-sm-3 col-form-label" style="text-align: right; font-size: 15pt;">Pilih Sesi Sambangan</label>
                                            <div class="col-sm-8 maxl">
												<select class="custom-select" required="true" name="sesi" id="sesi">
													<option selected disabled>-- Sesi / Sisa Kuota --</option>
													<?php
														foreach ($sesi as $a) {
													?>
														<option value="<?php echo $a->id ?>" <?php echo (!$a->kuota ? "disabled":"") ?>>
															<?php echo ($a->tanggal . ' ' . $a->jam_mulai . '-' . $a->jam_selesai . ' / ' . ($a->kuota ?: "Habis")) ?>
														</option>
													<?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>  
                                    <input type="submit" class="btn btn-success btnRegister" value="Register" />
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
