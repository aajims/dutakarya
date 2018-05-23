	<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Data Calon Karyawan</h3>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
					    <div class="alert bg-success" role="alert">
					        <span><?php echo $this->session->flashdata('success'); ?></span>
					    </div>
					<?php endif; ?>	
            
            <div class="box-body">
              <div class="table-responsive"> 	
			    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
			      <thead>
			        <tr>
					<th>No</th>         
	                  <th>Nama Karyawan</th>	                          	                          
	                  <th>No Telp</th>
	                  <th>Tgl Lahir</th>	                          
	                  <th>Posisi</th>
	                  <th>Tgl Masuk</th>
	                  <th>Referensi</th>                          
	                  <th>Action</th>	
				  </tr>
				      </thead>
				      <tbody>
					<?php $no=1; foreach($calon  as $row){ ?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $row->nm_karyawan;?></td>															       
						    <td><?php echo $row->no_telepon;?></td>
						    <td><?php echo tgl_indo($row->tgl_lahir);?></td>
						    <td><?php echo $row->jabatan;?></td>
						    <td><?php echo tgl_indo($row->tgl_masuk);?></td>
						    <td><?php echo $row->ref;?></td>							    
							<td class="center">
								<a class="btn btn-primary" href="<?php echo site_url('calon/view/'.$row->id_calon) ?>" ><i class="glyphicon glyphicon-search"></i></a>
							</td>
						</tr>
					<?php $no++; }?>
				      </tbody>
				    </table>
			    </div>
			  </div>
			 </div> 
			</div>

