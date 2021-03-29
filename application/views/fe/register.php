<html>
<head>
<title>FORMULIR | SAMBANGAN</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url()."assets/bootstrap.min.css"; ?>" rel="stylesheet" id="bootstrap-css">
<link href="<?php echo base_url()."assets/new.css"; ?>" rel="stylesheet" id="bootstrap-css">
<link rel="icon" href="<?php echo base_url('assets/logo.png'); ?>">
<link href="<?php echo base_url()."assets/main.css"; ?>" rel="stylesheet">
<script src="<?php echo base_url()."assets/bootstrap.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/jquery.min.js";?>"></script>
<script type="text/javascript">
    function validasi() {
        var program = document.getElementById("program").value;
        var nama = document.getElementById("nama").value;
        if (nama == "") {
            alert('Nama Kosong');
        }
        var tempat = document.getElementById("tempat").value;
        var tanggal = document.getElementById("tanggal").value;
        var jk = document.getElementById("jk").value;
        var nisn = document.getElementById("nisn").value;
        var sekolah = document.getElementById("sekolah").value;
        var alamat = document.getElementById("alamat").value;
        var hp = document.getElementById("hp").value;
        var ayah = document.getElementById("ayah").value;
        var ibu = document.getElementById("ibu").value;
        var email = document.getElementById("email").value;
        if (program != "" && nama != "" && tempat != "" && tanggal != "" && jk != "" && nisn != "" && sekolah!="" && alamat !="" hp != "" && ayah != "" && ibu != "" && email != "") {
            return true;
        }else{
            alert('Anda harus mengisi data dengan lengkap !');
        }
    }
</script>

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
                                    
                                    $attr = array('class'=>'horizontal-form', 'onClick'=>'validasi();');
                                    echo form_open(base_url().'user/registration', $attr);
                                ?>
                                    <br/>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label" style="text-align: right;">Nama Lengkap Wali Santri</label>
                                            <div class="col-sm-8">
                                                    <select class="custom-select" name="nama_walisantri" id="nama_walisantri">
                                                        <option value="<?php echo $bio['nama_walisantri']; ?>"><?php echo $bio['nama_walisantri']; ?></option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label" style="text-align: right;">Nama Lengkap Santri</label>
                                            <div class="col-sm-8">
                                                    <select class="custom-select" name="nama_santri" id="nama_santri">
                                                        <option value="<?php echo $bio['nama_santri']; ?>"><?php echo $bio['nama_santri']; ?></option>
                                                    </select>
                                                <!--<input type="text" class="form-control" name="nama" id="nama" placeholder="<?php echo $bio['nama_santri'] ?>" value="<?php echo $bio['nama_santri'] ?>">-->
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom: 0;">
                                            <label for="program" class="col-sm-3 col-form-label" style="text-align: right, font-size: 15pt;">Kelas</label>
                                            <div class="col-sm-8 maxl">
                                                    <select class="custom-select" name="kelas_santri" id="kelas_santri">
                                                        <option value="<?php echo $bio['kelas_santri']; ?>"><?php echo $bio['kelas_santri']; ?></option>
                                                    </select>
                                                
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group row" style="margin-bottom: 0;">
                                            <label for="program" class="col-sm-3 col-form-label" style="text-align: right, font-size: 15pt;">Pilih Sesi Sambangan</label>
                                            <div class="col-sm-8 maxl">
                                                    <select class="custom-select" name="sesi" id="sesi">
                                                        <!--<option value="">-- Pilih Sesi --</option>-->
                                                        <option value="sesi_1">Sesi 1 (08.00-08.20) <?php echo $kuota['COUNT(*)']; ?></option>
                                                        <option value="sesi_2">Sesi 2 (09.00-09.20)</option>
                                                        <option value="sesi_3">Sesi 3 (10.00-10.20)</option>
                                                        <option value="sesi_4">Sesi 4 (11.00-11.20)</option>
                                                        <option value="sesi_5">Sesi 5 (13.00-13.20)</option>
                                                        <option value="sesi_6">Sesi 6 (14.00-14.20)</option>
                                                        <option value="sesi_7">Sesi 7 (15.00-15.20)</option>
                                                    </select>
                                                
                                            </div>
                                        </div>
                                    </div>  
                                     
                                    
                                    <input onclick="validasi();" type="submit" class="btn btn-success btnRegister" value="Register" />

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