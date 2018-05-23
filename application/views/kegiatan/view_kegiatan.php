<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Data Kegiatan</h3>
            </div>
           <?php if ($this->session->flashdata('success')): ?>
					    <div class="alert bg-success" role="alert">
					        <span><?php echo $this->session->flashdata('success'); ?></span>
					    </div>
					<?php endif; ?>	
            <div class="box-header">
           	<a class="btn btn-success" href="<?php echo site_url(); ?>kegiatan/addview"><i class="glyphicon glyphicon-plus"></i> Add Kegiatan</a>
           	</div>
           	<br />
            <div class="box-body">
              <div class="table-responsive">  	
			    <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			      <thead>
			        <tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Kegiatan/ Rutinitas</th>
					<th>Status</th>
					<th>Aksi </th>	
				        </tr>
				      </thead>
				      <tbody>
					<?php $no=1; foreach($kegiatan  as $row){ ?>
						<tr>
							<td><?php echo $no;?></td>
						   <td><?php echo tgl_indo($row->tgl);?></td>
					       <td><?php echo $row->keterangan;?></td>
					       <td><?php echo $row->status;?></td>
					         <td>
					        <button title="Edit Data"  class="btn btn-primary" onclick="edit_bid(<?php echo $row->id_kegiatan;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
							<button title="Delete Data" class="btn btn-danger" onclick="delete_bid(<?php echo $row->id_kegiatan;?>)"><i class="glyphicon glyphicon-trash"></i></button>
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

    function edit_bid(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('kegiatan/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_kegiatan"]').val(data.id_kegiatan);
            $('[name="tgl"]').val(data.tgl);
            $('[name="nama"]').val(data.keterangan);
			$('[name="status"]').val(data.status);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Status Kegiatan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }


    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('partner/tambah')?>";
      }
      else
      {
        url = "<?php echo site_url('kegiatan/update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert(' update data');                
            }
        });
        
    }

    function delete_bid(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('kegiatan/delete')?>/"+id,
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
  
  <div class="example-modal" >
        <div class="modal modal-info"id="modal_form" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Edit Data</h4>
              </div>
              <div class="modal-body form">           
          <div class="form-body">
          <form action="#" id="form" class="form-horizontal" onsubmit="save()">
          <input type="hidden" value="" name="id_kegiatan"/>
            <div class="form-group">
              <label class="control-label col-md-3">Tanggal</label>
              <div class="col-md-9">
                <input name="tgl" readonly=""  class="form-control " type="text" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Kegiatan</label>
              <div class="col-md-9">
                <input name="nama"  class="form-control" type="text" >
              </div>
            </div>
           
			<div class="form-group">
              <label class="control-label col-md-3">Status</label>
              <div class="col-md-9">
                <select class="form-control" name="status" >
	                <?php
					   $pilihan	= array("Pending", "Proses", "Tuntas");
			          foreach ($pilihan as $nilai) {
			            if ($dataLevel==$nilai) {
			                $cek=" selected";
			            } else { $cek = ""; }
			            echo "<option value='$nilai' $cek>$nilai</option>";
			          }
			          ?>
                </select>
              </div>
            </div>
            
       </div>      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-outline">Save changes</button>
              </div>
            </div>
           </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>