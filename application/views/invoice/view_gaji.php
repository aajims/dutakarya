<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rincian Biaya Lembur</h3>
            </div>
            <div class="box-header">
            <a class="btn btn-primary" href="<?php echo site_url(); ?>gaji/addview"><i class="glyphicon glyphicon-plus"></i> New Data</a>
           	</div>
           	<br />
            <div class="box-body">
    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
		<th>No</th>
		<th>Nama Karyawan</th>
		<th>Jabatan</th>
		<th>Gaji Pokok</th>
		<th>Periode</th>
	    <th>Nama Customer</th>
		<th>Action</th>
        </tr>
      </thead>
      <tbody>
	<?php $no=1; foreach($gaji as $row){ ?>
	<tr>
	   <td><?php echo $no;?></td>
	   <td><?php echo $row->nm_karyawan;?></td>
	   <td><?php echo $row->jab;?></td>
	   <td><?php echo $row->gaji;?></td>
       <td><?php echo $row->periode;?></td>
       <td><?php echo $row->nm_partner;?></td>
       <td><a class="btn btn-primary" href="<?php echo site_url('Gaji/view/'.$row->nik) ?>" ><i class="glyphicon glyphicon-search"></i></a>&nbsp;&nbsp;
           <a class="btn btn-success" href="<?php echo site_url('Gaji/cetak/'.$row->nik)?>" target="_blank" ><i class="glyphicon glyphicon-print"></i> </a>
       </td>
	</tr>
	<?php $no++; }?>
      </tbody>
    </table>
    </div>
  </div>
 </div> 
</div>


  