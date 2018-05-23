<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data WO Aplikasi</h3>
            </div>
           <?php if ($this->session->flashdata('success')): ?>
					    <div class="alert bg-success" role="alert">
					        <span><?php echo $this->session->flashdata('success'); ?></span>
					    </div>
					<?php endif; ?>	

            <div class="box-body">
              <div class="table-responsive">  	
			    <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			      <thead>
			        <tr>
					<th>No</th>
					<th>Tanggal</th>
                    <th>Nama WO</th>
					<th>Keterangan WO</th>
					<th>Status</th>
					<th>Nama Staff</th>
				        </tr>
				      </thead>
				      <tbody>
					<?php $no=1; foreach($wo  as $row){ ?>
						<tr>
						   <td><?php echo $no;?></td>
						   <td><?php echo tgl_indo($row->tgl);?></td>
                           <td><?php echo $row->nama;?></td>
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

