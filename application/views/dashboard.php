<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $admin; ?></h3>

              <p>Data User </p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $partner; ?></h3>
              <p>Data Customer </p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      
      <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $karyawan; ?></h3>
              <p>Data Karyawan</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>2<?php // echo $terima; ?></h3>
              <p>Data Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <!-- Main row -->
      <div class="row">
        <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <!-- The time line -->
          <ul class="timeline">
            <li>        
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i>  <?php echo $time; ?></span>

                <h3 class="timeline-header">Selamat Datang &nbsp;<a href="#"><?php echo $this->session->userdata("nama_lengkap"); ?></a></h3>

                <div class="timeline-body">
                	Anda Login Sebagai &nbsp;<strong>:&nbsp;<?php echo $this->session->userdata("level"); ?></strong> <br /><br />
                  Aplikasi ini di Buat Untuk Memenuhi Kebutuhan Akan Data Master karyawan di PT. Duta Karya Sinergi
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>                  
                </div>
              </div>
            </li>
    </section>
      </div>
      <!-- /.row (main row) -->

    </section>
