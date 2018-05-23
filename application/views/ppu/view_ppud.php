<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">(PPU) Pengajuan Permintaan Uang</h3>
            </div>
            <div class="box-body">
    <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
		<th>No</th>
		<th>No PPU</th>
		<th>Departemen</th>
		<th>Periode</th>
	    <th>Tgl Pengajuan</th>
	    <th>Status</th>
	    <th>Staff</th>
	    <th>Tgl Disetujui</th>
	    <th>Act</th>
        </tr>
      </thead>
      <tbody>
	<?php $no=1; foreach($ppu as $row){ ?>
	<tr>
	   <td><?php echo $no;?></td>
	   <td><?php echo $row->no_ppu;?></td>
	   <td><?php echo $row->dept;?></td>
	   <td><?php echo $row->periode;?></td>
       <td><?php echo tgl_indo($row->tgl_pengajuan);?></td>
       <td><?php echo $row->status;?></td>
       <td><?php echo $row->nama_lengkap;?></td>
       <td><?php echo $row->tgl_setuju;?></td>
       <td>
       	<a title="View Data" class="btn btn-success" href="<?php echo site_url('ppu/view/'.$row->kode); ?>"><i class="glyphicon glyphicon-search"></i></a>
       </td>
	</tr>
	<?php $no++; }?>
      </tbody>
    </table>
    </div>
  </div>
 </div> 
</div>

