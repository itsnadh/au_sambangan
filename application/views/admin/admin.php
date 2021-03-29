<?php
  include 'head.php';
  include 'side.php';

    $lid = $this->session->userdata('id');
  ?>


<script type="text/javascript">
  tinymce.init({
    selector: '#textarea',
    forced_root_block : '',
    force_br_newlines : true,
    force_p_newlines : false,
  });
</script>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Administrator</li>
          </ol>
          
          <div class="row">
            <div class="col-xl-7 col-sm-7 mb-3">
              <?php
                if ($this->session->flashdata('sukses')) {
                  echo '<div class="alert alert-dismissible alert-success">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>'.$this->session->flashdata('sukses').'</strong>
                        </div>';
                }
                if ($this->session->flashdata('gagal')) {
                  echo '<div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>'.$this->session->flashdata('gagal').'</strong>
                        </div>';
                }
              ?>
              <div class="col-sm-12 card-body" style="padding: 0 0 0 0">
                <div class="card border-success mb-3">
                  <div class="card-header">Tambah admin</div>
                  <div class="card-body ">
                    <?php 
                      $uname = $this->session->userdata('uname');
                      $hidden = array('author' => $uname, );
                      echo form_open(base_url().'admin/add_admin', 'onSubmit="validasi()"', $hidden);
                    ?>
                      <fieldset>
                        <div class="form-group">
                          <label for="user">Username</label>
                          <input type="text" name="user" class="form-control" id="user" placeholder="Masukkan username (tanpa spasi)">
                          <small id="emailHelp" class="form-text text-muted">Username digunakan untuk login. Tidak boleh menggunakan spasi.</small>
                        </div>
                        <div class="form-group">
                          <label for="email">E-mail</label>
                          <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Alamat Email">
                        </div>
                        <div class="form-group">
                          <label for="pass">Password</label>
                          <input type="password" name="pass" class="form-control" id="pass" placeholder="Masukkan password">
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <select name="status" class="select col-sm-6">
                            <option value="0">Admin</option>
                            <!--<option value="1">Super Admin</option>-->
                          </select>
                        </div>
                        <button type="submit" value="simpan" class="btn btn-primary">Tambah</button>

                      </fieldset>
                    </form>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-xl-5 col-sm-5 mb-3">
              <div class="card-body" style="padding: 0 0 0 0">
                <div class="card border-success mb-3">
                  <div class="card-header">Data Admin</div>
                  <div class="card-body">
                    <table width="100%" border="1" class="table table-bordered">
                      <thead>
                      <tr align="center">
                         <td width="50%"><b>Nama</b></td>
                         <td width="20%"><b>Hapus</b></td>
                       </tr> 
                     </thead> 
                     <tbody>
                      <?php
                        foreach ($admin as $ad) {
                      ?>
                       <tr>
                         <td><a href="<?php echo base_url().'admin/edit_admin/'.$ad->id; ?>"><?php echo $ad->username; ?></a></td>
                         <td>
                          <?php
                              if ($ad->id <> $lid || $ad->id <> "1") {
                          ?>
                          <a data-toggle="modal" data-target="#hapusModal<?php echo $ad->id;?>" href="<?php echo base_url().'admin/hapus_admin/'.$ad->id; ?>">Hapus</a>
                          <?php
                              }
                          ?>
                        </td>
                         
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
        <!-- /.container-fluid -->
    <!-- MODAL HAPUS INFO -->
    <?php
      foreach ($admin as $ad) {
    ?>
    <div class="modal fade" id="hapusModal<?php echo $ad->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Pengumuman?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Yakin akan menghapus pengumuman?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger" href="<?php echo base_url().'admin/hapus_admin/'.$ad->id; ?>">HAPUS</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>


<script type="text/javascript">
  validasi(){
    var judul = document.forms["form"]["judul"].value;
    var isi = document.forms["form"]["isi"].value;
    if (judul != "") {
        if ($isi != "") {
          return true;
        }else{
          alert('Masukkan isi pengumuman..!!');
        }
    }else{
      alert('Silahkan Masukkan judul pengumuman..!!');
    }
  }
</script>

<?php
  include 'foot.php';
?>