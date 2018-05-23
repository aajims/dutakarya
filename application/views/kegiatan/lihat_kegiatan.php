<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kegiatan</h3>
            </div>
           <?php if ($this->session->flashdata('success')): ?>
					    <div class="alert bg-success" role="alert">
					        <span><?php echo $this->session->flashdata('success'); ?></span>
					    </div>
					<?php endif; ?>	
            <div class="box-header">
           	
           	</div>
           	
            <div class="box-body">
              <div class="table-responsive">  	
			    <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			      <thead>
			        <tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Kegiatan/ Rutinitas</th>
					<th>Status</th>
				    <th>Nama Staff</th>
					</tr>
				      </thead>
				      <tbody>
					<?php $no=1; foreach($kegiatan  as $row){ ?>
						<tr>
							<td><?php echo $no;?></td>
						   	<td><?php echo $row->tgl;?></td>
					       	<td><?php echo $row->keterangan;?></td>
					       	<td><?php echo $row->status;?></td>
					       	<td><?php echo $row->nama_lengkap;?></td>
						</tr>
					<?php $no++; }?>
				      </tbody>
				    </table>
			    </div>
			  </div>
			 </div> 
			</div>

