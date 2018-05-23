<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Data Karyawan</h3>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
					    <div class="alert bg-success" role="alert">
					        <span><?php echo $this->session->flashdata('success'); ?></span>
					    </div>
					<?php endif; ?>	
            <div class="box-header">
           	<a class="btn btn-success" href="<?php echo site_url(); ?>Karyawan/addview"><i class="glyphicon glyphicon-plus"></i> Add Karyawan</a>
           	</div>
           	<br />
            <div class="box-body">
               <div class="table-responsive"> 
		    <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		      <thead>
		        <tr>
				<th>No</th>
                  <th>Nama Karyawan</th>	                          	                          
                  <th>No Telp</th>
                  <th>Jabatan</th>
                  <!--th>Umur</th>
                  <th>SIM</th>
                  <th>Berlaku SIM</th-->
                  <th>Akhir Kontrak</th>
                  <th>Bekerja di</th>                          
                  <th>Action</th>	
			  </tr>
			      </thead>
			      <tbody>
				<?php $no=1; foreach($karyawan  as $row){ ?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $row->nm_karyawan;?></td>															       
					    <td><?php echo $row->no_telepon;?></td>
                        <td><?php echo $row->jabatan;?></td>
					    <!--td><?php // echo $row->umur;?></td>
                        <td><?php // echo $row->sim;?></td>
                        <td><?php // echo tgl_indo($row->masa);?></td-->
					    <td><?php echo tgl_indo($row->akhir_kontrak);?></td>
					    <td><?php echo $row->nm_partner;?></td>
						<td class="center">
							<a class="btn btn-primary" href="<?php echo site_url('Karyawan/view/'.$row->id_karyawan) ?>" ><i class="glyphicon glyphicon-search"></i></a>
							<a class="btn btn-info" title="Edit Data" href="<?php echo site_url('Karyawan/edit/'.$row->id_karyawan) ?>" ><i class="glyphicon glyphicon-pencil"></i></a>																		
							<button title="Delete Data" class="btn btn-danger" onclick="delete_bid(<?php echo $row->id_karyawan; ?>)"><i class="glyphicon glyphicon-trash"></i></button>									
						</td>
					</tr>
				<?php $no++; }?>
			      </tbody>
			    </table>
			    </div>
			  </div>
			 </div> 
			</div>

<script type="text/javascript">
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
        $('#example1').DataTable(); } );



    function delete_bid(id)
    {
        if(confirm('Apakah Yakin Mau Menghapus Data Penting Ini....??'))
        {
            // ajax delete data from database
            $.ajax({
                url : "<?php echo site_url('karyawan/delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {

                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }

</script>
