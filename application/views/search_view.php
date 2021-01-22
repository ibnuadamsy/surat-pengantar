
 
  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url('index.php/Welcome');?>"><i class="fa fa-dashboard"></i> Home > Hasil Pencarian</a></li>
        </ol>
      </section>
      
        <div class="col-xs-12"><br>
        <span class="badge badge-danger">Daftar Pencarian</span><br><br>
          <div class="box">
            <div class="box-header">
                <div class="box-body table-responsive no-padding">
              <table class="table table-striped">
				<thead class="thead thead-navy">
					<tr>
						<th width ='15%' scope="col">No Pengantar</th>
						<th width ='15%' scope="col">NIK</th>
						<th width ='20%' scope="col">Tanggal Pengantar</th>
						<th width ='15%' scope="col">Keperluan</th>
						<th width ='10%' scope="col">Status RT</th>
            <th width ='10%' scope="col">Status RW</th>
            <th width ='10%' scope="col">Status Kelurahan</th>
            <th width ='20  %' scope="col">Keterangan</th>
            <th width ='15%' scope="col">Cetak Surat</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($data as $val):?>
					<tr>
						<td><?php echo $val->no_pengantar;?> </td>
            <td><?php echo $val->NIK;?></td>
                        <td><?php echo $val->tgl_pengantar; ?></td>
                        <td><?php echo $val->keperluan; ?></td>
                        <td>
                        	<?php if($val->status_rt==1){
                  echo "<span class='label label-danger'> Belum Validasi</span>";
                  $site=site_url('pengantar_c/search/'.$val->no_pengantar);
                  //$teks="Nonaktifkan Data";
                  $icon="switch";
                  $class="danger";
                }elseif($val->status_rt==2){
                  echo "<span class='label label-info'> Validasi</span>";
                  $site=site_url('pengantar_c/search/'.$val->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="info";
                  }else{
                  echo "<label class='label label-primary> Lainnya</label>";
                  $site=site_url('pengantar_c/search/'.$val->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="default";
                }?>
                        </td>
                        <td>
                        	<?php if($val->status_rw==1){
                  echo "<span class='label label-danger'> Belum Validasi</span>";
                  $site=site_url('pengantar_c/search/'.$val->no_pengantar);
                  //$teks="Nonaktifkan Data";
                  $icon="switch";
                  $class="danger";
                }elseif($val->status_rw==2){
                  echo "<span class='label label-info'> validasi</span>";
                  $site=site_url('pengantar_c/search/'.$val->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="info";
                  }else{
                  echo "<label class='label label-primary> Lainnya</label>";
                  $site=site_url('pengantar_c/search/'.$val->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="default";
                }?>
                        </td>
                        <td>
                        	<?php if($val->status_kel==1){
                  echo "<span class='label label-danger'> Belum Validasi</span>";
                  $site=site_url('pengantar_c/search/'.$val->no_pengantar);
                  //$teks="Nonaktifkan Data";
                  $icon="switch";
                  $class="danger";
                }elseif($val->status_kel==2){
                  echo "<span class='label label-info'> Validasi</span>";
                  $site=site_url('pengantar_c/search/'.$val->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="info";
                  }else{
                  echo "<label class='label label-primary> Lainnya</label>";
                  $site=site_url('pengantar_c/search/'.$val->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="default";
                }?>
                        </td>
                        <td><?php echo $val->keterangan; ?></td>
                        <td align="center">
                        <?php if (isset($val->status_rt) && ($val->status_rw=='2')&& ($val->status_kel=='2')){
                           echo "<a href=\"/surat-pengantar-pejuang.herokuapp.com/laporan/laprec/$val->no_pengantar\" type='button' class='btn btn-success btn-xs tooltips'> <span class='glyphicon glyphicon-print'></span> <br>";
                           
                          }else{

                            ?><a href="<?php echo base_url('/laporan/laprec/'.$val->no_pengantar); ?>" type="button" class="btn btn-success btn-xs disabled" >
                          <i class="glyphicon glyphicon-print" class="btn btn-success btn-xs tooltips disabled" data-toggle="tooltip"data-placement="bottom" title="Print"></i></a>
                          <?php } ?></td>
                        
                        </tr>
          
				<?php endforeach;?>
				</tbody>
			</table> 
		</div>
	</div>
</div>
</div>
</div>
</div>

