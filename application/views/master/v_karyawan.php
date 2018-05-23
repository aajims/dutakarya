    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('./Admin/images/karyawan/'.$kar->foto_karyawan);?>" >
			 <hr />	
              <h3 class="profile-username text-center"><?php echo $kar->nm_karyawan; ?></h3>

              <p class="text-muted text-center">Jabatan : <?php echo $kar->jabatan; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item"> 
                  <b>Status Kerja</b> <a class="pull-right"><?php echo $kar->status_karyawan; ?></a>
                </li>
                <br />
                <li class="list-group-item">
                  <b>Tgl Awal Kontrak</b> <a class="pull-right"><?php echo tgl_indo($kar->awal_kontrak); ?></a>
                </li>
                <br />
                <li class="list-group-item">
                  <b>Tgl Akhir Kontrak</b> <a class="pull-right"><?php echo tgl_indo($kar->akhir_kontrak); ?></a>
                </li>
                <br />
              </ul>
              <button class="btn btn-primary btn-block" onclick="self.history.back()">Kembali</button>
			  	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Data Profil</a></li>
              <li><a href="#timeline" data-toggle="tab">No Identitas</a></li>
              <li><a href="#settings" data-toggle="tab">Data Detail</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <form class="form-horizontal">
                  <table id="dynamic-table" class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><strong>Kode Karyawan</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->kd_karyawan; ?></strong></td>
                      </tr>                       
                      <tr>
                        <td><strong>Nama Karyawan</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->nm_karyawan; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Alamat</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->alamat; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Kota</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->kota; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Provinsi</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->provinsi; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>No telepon 1</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->no_telepon; ?></strong></td>
                      </tr>
                       <tr>
                        <td><strong>No telepon 2</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->no_telp; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Agama</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->agama; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Jenis Kelamin</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->kelamin; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Tempat Lahir</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->tempat_lahir; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Tanggal Lahir</strong></td>
                        <td>:&nbsp;<strong><?php echo tgl_indo($kar->tgl_lahir); ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Status Kawin</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->status_kawin; ?></strong></td>
                      </tr>
                      
                      </tbody>
                  </table> 
                  <div class="form-group">
                   
                  </div>
                </form>
                <!-- /.post -->


               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
               <table id="dynamic-table" class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><strong>NIK Karyawan</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->nik; ?></strong></td>
                      </tr>                       
                      <tr>
                        <td><strong>No PKWT</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->no_pkwt; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>No MOU</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->no_mou; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>No KTP</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->no_ktp; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>NO NPWP</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->no_npwp; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>No BPJS</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->no_bpjs; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>No KPJ</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->no_kpj; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Nama Bank</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->nm_bank; ?></strong></td>
                      </tr>                       
                      <tr>
                        <td><strong>No Rekening</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->no_rek; ?></strong></td>
                      </tr>
                      </tbody>
                  </table> 
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <table id="dynamic-table" class="table table-user-information">
                    <tbody>
                      
                      <tr>
                        <td><strong>Size Baju</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->size_baju; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Size Celana</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->size_celana; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Size Sepatu</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->size_sepatu; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Penempatan Lokasi</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->penempatan; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Tanggal Masuk</strong></td>
                        <td>:&nbsp;<strong><?php echo tgl_indo($kar->tgl_masuk); ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Pendidikan</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->pendidikan; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Status Karyawan</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->status_karyawan; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Nama Customer</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->nm_partner; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Manager</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->manager; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Awal Kontrak</strong></td>
                        <td>:&nbsp;<strong><?php echo tgl_indo($kar->awal_kontrak); ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Akhir Kontrak</strong></td>
                        <td>:&nbsp;<strong><?php echo tgl_indo($kar->akhir_kontrak); ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Sebab Berhenti</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->sebab_henti; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Referensi</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->ref; ?></strong></td>
                      </tr>
                      <tr>
                        <td><strong>Status</strong></td>
                        <td>:&nbsp;<strong><?php echo $kar->sts_aktif; ?></strong></td>
                      </tr>
                      </tbody>
                  </table> 
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
 			