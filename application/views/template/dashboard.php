<div class="content-wrapper">
  <div class="container">
    <div><?php if ($this->session->flashdata('sukses')) : ?>
        <script>
          swal({
            title: 'Permohonan Pengantar!!',
            text: "<?php echo $this->session->flashdata('sukses'); ?>",
            type: 'success'
          });
        </script>
      <?php endif; ?>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br><br>
      <ol class="breadcrumb">
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="jumbotron bg-green">
        <h1 class="display-4">Selamat Datang!</h1>
        <p class="lead">di Website Pembuatan Surat Pengantar RT/RW Online Kelurahan Pejuang</p>
        <hr class="my-4">
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-tambah">Buat Pengantar</button>
        <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modal-search">Lihat Status Pengantar</button>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success"></div>
        </div>
      </div>

      <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <form action="<?php echo site_url('pengantar_c/simpan'); ?>" method="post">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                  <font color="black">Isikan Keperluan Anda</font>
                </h4>
              </div>

              <div class="modal-body">


                <div class="form-group">
                  <label class='col-md-3'>
                    <font color="black">No Pengantar</font>
                  </label>
                  <div class='col-md-9'><input type="text" name="no_pengantar" value="<?= $nomer; ?>" class="form-control" readonly=""></div>
                </div>

                <div class="form-group">
                  <label class='col-md-3'>
                    <font color="black">NIK</font>
                  </label>
                  <div class='col-md-9'>
                    <input type="text" id="NIK" name="NIK" placeholder="Masukan NIK Anda" class="form-control" required=""></div>
                </div>
                <br>

                <div class="form-group">
                  <label class='col-md-3'>
                    <font color="black">Nama Lengkap</font>
                  </label>
                  <div class='col-md-9'><input type="text" name="nama" autocomplete="off" placeholder="Nama Otomatis" class="form-control" readonly="" required=""></div>
                </div>
                <br>

                <div class="form-group">
                  <label class="control-label col-md-3">
                    <font color="black">Keperluan</font>
                  </label>
                  <div class='col-md-9'>
                    <select name="keperluan" class="form-control" autocomplete="off" required="">
                      <option value="">Pilih Keperluan</option>
                      <option value="Kartu Keluarga Baru (KK)">Kartu Keluarga (KK) Baru</option>
                      <option value="Perubahan Kartu Keluarga (KK)">Perubahan Kartu Keluarga (KK)</option>
                      <option value="Kematian">Kematian</option>
                      <option value="Ahli Waris">Ahli Waris</option>
                      <option value="Pindah Alamat">Pindah Alamat</option>
                      <option value="Izin Keramaian">Izin Keramaian</option>
                      <option value="Keluarga Ekonomi Lemah">Keluarga Ekonomi Lemah</option>
                      <option value="Izin Usaha">Izin Usaha</option>
                      <option value="izin Mendirikan Bangunan">Izin Mendirikan Bangunan</option>
                      <option value="Domisili Usaha">Domisili Usaha</option>
                      <option value="Domisili">Domisili</option>
                      <option value="Nikah">Nikah</option>
                      <option value="Talak">Talak</option>
                      <option value="Cerai">Cerai</option>
                      <option value="Rujuk">Rujuk</option>
                      <option value="Belum Nikah">Belum Nikah</option>
                      <option value="Pensiun">Pensiun</option>
                      <option value="Taspen">Taspen</option>
                      <option value="Belum Punya Rumah">Belum Punya Rumah</option>
                      <option value="Kartu Identitas Domisili Sementara (KIDS)">Kartu Identitas Domisili Sementara (KIDS)</option>
                      <option value="Kartu Identitas Penduduk Musiman (KIPEM)">Kartu Identitas Penduduk Musiman (KIPEM)</option>
                      <option value="KARNOP">KARNOP</option>
                      <option value="Kartu Identitas Kerja (KIK)">Kartu Identitas Kerja (KIK)</option>
                      <option value="SKKB">SKKB</option>
                      <option value="SKCK">SKCK</option>
                      <option value="Wesel">Wesel</option>
                      <option value="Paket Berharga">Paket Berharga</option>
                      <option value="Akta Tanah">Akta Tanah</option>
                      <option value="Surat Pemeritahuan Pajak Terutang (SPPT)">Surat Pemberitahuan Pajak Terutang (SPPT)</option>
                      <option value="Pajak Bumi Bangunan (PBB)">Pajak Bumi Bangunan (PBB)</option>
                    </select>
                  </div>
                </div>
              </div>
              <br><br>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i>Buat</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#NIK').on('input', function() {

            var NIK = $(this).val();
            $.ajax({
              type: "POST",
              url: "<?php echo base_url('index.php/welcome/get_nik') ?>",
              dataType: "JSON",
              data: {
                NIK: NIK
              },
              cache: false,
              success: function(data) {
                $.each(data, function(NIK, nama) {
                  $('[name="nama"]').val(data.nama);


                });

              }
            });
            return false;
          });

        });
      </script>

      <div class="modal modal-success fade" id="modal-search">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Cari Status Pengantar</h4>
            </div>
            <div class="modal-body">
              <form id="form_search" action="<?php echo site_url('welcome/search'); ?>" method="GET">

                <div class="form-group">
                  <div class="input-group input-group-xs">
                    <input type="text" class="form-control" name="NIK" placeholder="Masukan NIK Anda">

                    <span class="input-group-btn">
                      <button type="submit" name="submit" class="btn btn-info btn-flat">Cari!</button>
                    </span>
                  </div>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Keluar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <script src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>" type="text/javascript"></script>
      <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
      <script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>
      <script type="text/javascript">
        $(document).ready(function() {

          $('#NIK').autocomplete({
            source: "<?php echo site_url('pengantar_c/get_autocomplete'); ?>",

            select: function(event, ui) {
              $(this).val(ui.item.label);
              $("#form_search").submit();
            }
          });

        });
      </script>

    </section>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->