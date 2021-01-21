<div class="content-wrapper">

  <?php if ($this->session->flashdata('sukses')) : ?>
    <script>
      swal({
        title: 'Data Penduduk Baru!!',
        text: "<?php echo $this->session->flashdata('sukses'); ?>",
        type: 'success'
      });
    </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')) : ?>
    <script>
      swal({
        title: 'Oops!!',
        text: "<?php echo $this->session->flashdata('error'); ?>",
        type: 'error'
      });
    </script>
  <?php endif; ?>

  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Data Penduduk
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Home > Input data penduduk</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah">
                Tambah Penduduk
              </button>
              </td>

            </div>
          </div>
        </div>
      </div>
    </section>

    <div id="modal-tambah" class="modal fade">
      <div class="modal-dialog">
        <form action="<?php echo site_url('admin/simpan'); ?>" method="post">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Isikan Data Penduduk</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label class='col-md-3'>NIK</label>
                <div class='col-md-9'>
                  <input type="text" id="NIK" name="NIK" placeholder="Masukan NIK Anda" class="form-control">
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Nama Lengkap</label>
                <div class='col-md-9'><input type="text" name="nama" autocomplete="off" placeholder="Nama Penduduk" class="form-control" required=""></div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-md-3">Jenis Kelamin</label>
                <div class="col-md-9">
                  <select name="jenis_kel" class="form-control">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Tempat Lahir</label>
                <div class='col-md-9'><input type="text" name="tempat_lahir" autocomplete="off" placeholder="Tempat Lahir" class="form-control" required=""></div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Tanggal Lahir</label>
                <div class='col-md-9'> <input type="text" id="tanggal" name="tgl_lahir" autocomplete="off" placeholder="Tanggal Lahir" class="form-control" required="">
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-md-3">Kewarganegaraan</label>
                <div class="col-md-9">
                  <select name="kewarganegaraan" class="form-control">
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-md-3">Agama</label>
                <div class="col-md-9">
                  <select name="agama" class="form-control">
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-md-3">Status</label>
                <div class="col-md-9">
                  <select name="status" class="form-control">
                    <option value="">Pilih Status</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-md-3">Pend. Terakhir</label>
                <div class="col-md-9">
                  <select name="pendidikan_ter" class="form-control">
                    <option value="">Pilih Pendidikan Terakhir</option>
                    <option value="Tidak Tamat SD/Sederajat">Tidak Tamat SD/Sederajat</option>
                    <option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                    <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                    <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                    <option value="Diploma III">Diploma III</option>
                    <option value="Diploma IV/Strata I">Diploma IV/Strata I</option>
                    <option value="Strata II">Strata II</option>
                    <option value="Strata III">Strata III</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class='col-md-3'>Pekerjaan</label>
                <div class='col-md-9'><input type="text" name="pekerjaan" autocomplete="off" required placeholder="Pekerjaan" class="form-control" required=""></input></div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Alamat</label>
                <div class='col-md-9'><textarea type="text" name="alamat" autocomplete="off" required placeholder="ALAMAT" class="form-control" required=""></textarea></div>
              </div>

              <br>
              <div class="form-group">
                <label class="control-label col-md-3">RT</label>
                <div class="col-md-9">
                  <select name="RT" class="form-control">
                    <option value="">Pilih RT</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-md-3">RW</label>
                <div class="col-md-9">
                  <select name="RW" class="form-control">
                    <option value="">Pilih RW</option>
                    <option value="12">12</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Kelurahan</label>
                <div class='col-md-9'><input type="text" name="kelurahan" id="kelurahan" autocomplete="off" placeholder="Kelurahan" class="form-control" required=""></input></div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Kecamatan</label>
                <div class='col-md-9'><input type="text" name="kecamatan" id="kecamatan" autocomplete="off" placeholder="Kecamatan" class="form-control" required=""></input></div>
              </div>
              <br>

              </br><br><br>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-send-o"></i> Simpan</button>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>