<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Data Karyawan</h3>
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
				  <th>NIK</th>                   
                  <th>Nama Karyawan</th>	                          	                          
                  <th>No Telp</th>
                  <th>Tgl Lahir</th>	                          
                  <th>Jabatan</th>
                  <th>Akhir Kontrak</th>
                  <th>Bekerja di</th>                          
                  <th>Action</th>	
			  </tr>
			      </thead>
			      <tbody>
				<?php $no=1; foreach($karyawan  as $row){ ?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $row->kd_karyawan;?></td>
						<td><?php echo $row->nm_karyawan;?></td>															       
					    <td><?php echo $row->no_telepon;?></td>
					    <td><?php echo tgl_indo($row->tgl_lahir);?></td>
					    <td><?php echo $row->jabatan;?></td>
					    <td><?php echo tgl_indo($row->akhir_kontrak);?></td>
					    <td><?php echo $row->nm_partner;?></td>							    
						<td class="center">
							<a class="btn btn-primary" href="<?php echo site_url('Karyawan/view/'.$row->id_karyawan) ?>" ><i class="glyphicon glyphicon-search"></i></a>
						</td>
					</tr>
				<?php $no++; }?>
			      </tbody>
			    </table>
			    </div>
			  </div>
			 </div> 
			</div>

