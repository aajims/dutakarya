<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Data Customer</h3>
            </div>
           <?php if ($this->session->flashdata('success')): ?>
					    <div class="alert bg-success" role="alert">
					        <span><?php echo $this->session->flashdata('success'); ?></span>
					    </div>
					<?php endif; ?>	
            <div class="box-header">
           	<a class="btn btn-success" href="<?php echo site_url(); ?>Partner/addview"><i class="glyphicon glyphicon-plus"></i> Add Customer</a>
           	</div>
           	<br />
            <div class="box-body">
              <div class="table-responsive">  	
			    <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			      <thead>
			        <tr>
					<th>No</th>
					<th>Nama Partner</th>
					<th>Alamat</th>
					<th>Manager</th>
				    <th>No Telpon</th>
					<th>Email</th>
					<th>Aksi </th>	
				        </tr>
				      </thead>
				      <tbody>
					<?php $no=1; foreach($partner  as $row){ ?>
						<tr>
							<td><?php echo $no;?></td>
						   <td><?php echo $row->nm_partner;?></td>
					       <td><?php echo $row->alamat;?></td>
					       <td><?php echo $row->manager;?></td>
					       <td><?php echo $row->no_telp;?></td>
					       <td><?php echo $row->email;?></td>
					         <td>
							<a class="btn btn-info" title="Edit Data" href="<?php echo site_url('Partner/edit/'.$row->id_partner) ?>" ><i class="glyphicon glyphicon-pencil"></i></a>
							<button title="Delete Data" class="btn btn-danger" onclick="delete_bid(<?php echo $row->id_partner;?>)"><i class="glyphicon glyphicon-trash"></i></button>
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

    function add()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
    
    }

    function edit_bid(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('partner/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_partner"]').val(data.id_partner);
            $('[name="nama"]').val(data.nm_partner);
            $('[name="alamat"]').val(data.alamat);           
            $('[name="manager"]').val(data.manager);                      
            $('[name="telp"]').val(data.no_telp);
			$('[name="email"]').val(data.email);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Customer'); // Set title to Bootstrap modal title

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
        url = "<?php echo site_url('partner/update')?>";
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
            url : "<?php echo site_url('partner/delete')?>/"+id,
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
  
  <!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Customer</h3>
            </div>            
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal" onsubmit="save()">
                    <input type="hidden" value="" name="id_partner"/> 
                    <div class="form-body">                    	
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Customer</label>
                            <div class="col-md-9">
                                <input type="text" required="" name="nama" placeholder="Input Nama Customer" class="form-control" >                                
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input type="text"  name="alamat" placeholder="Input Alamat" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Manager</label>
                            <div class="col-md-9">
                                <input type="text" maxlength="25" name="manager" placeholder="Input Nama Lengkap" class="form-control" required="" >                                
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Telepon</label>
                            <div class="col-md-9">
                                <input type="text" maxlength="12" name="telp" placeholder="Input dengan angka" class="form-control" required="" >                                
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" placeholder="Input Email Valid" class="form-control" required="" >                                
                                <span class="help-block"></span>
                            </div>
                        </div>                                     
                    </div>                
            	</div>
            <div class="modal-footer">
                <button id="btnSave"  class="btn btn-primary">Save Change</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 