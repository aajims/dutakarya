<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Data Bank</h3>
            </div>
            <div class="box-header">
           	<button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Add Bank</button>
           	</div>
           	<br />
            <div class="box-body">
		       <div class="table-responsive">   	
			    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
			      <thead>
			        <tr>
						<th>No</th>
						<th>Kode Bank</th>
						<th>Nama Bank</th>
						<th>Cabang</th>
						<th>Aksi </th>	
					  </tr>
					      </thead>
					      <tbody>
						<?php $no=1; foreach($bank  as $row){ ?>
							<tr>
								<td><?php echo $no;?></td>
							   <td><?php echo $row->kd_bank;?></td>
						       <td><?php echo $row->nm_bank;?></td>
						       <td><?php echo $row->cabang;?></td>
						         <td>
								<button title="Edit Data" class="btn btn-warning" onclick="edit_bid(<?php echo $row->id_bank;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
								<button title="Delete Data" class="btn btn-danger" onclick="delete_bid(<?php echo $row->id_bank;?>)"><i class="glyphicon glyphicon-trash"></i></button>
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
        url : "<?php echo site_url('bank/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_bank"]').val(data.id_bank);
            $('[name="kode"]').val(data.kd_bank);
            $('[name="nama"]').val(data.nm_bank);           
            $('[name="cab"]').val(data.cabang);
			

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Bank'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('bank/tambah')?>";
      }
      else
      {
        url = "<?php echo site_url('bank/update')?>";
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
            url : "<?php echo site_url('bank/delete')?>/"+id,
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
                <h3 class="modal-title">Form Bank</h3>
            </div>            
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal" onsubmit="save()">
                    <input type="hidden" value="" name="id_bank"/> 
                    <div class="form-body">                    	
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Bank</label>
                            <div class="col-md-9">
                                <input type="text"  name="kode" placeholder="Input Kode Bank" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Bank</label>
                            <div class="col-md-9">
                                <input type="text" required="" name="nama" placeholder="Input Nama Bank" class="form-control" >                                
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Cabang</label>
                            <div class="col-md-9">
                                <input type="text" maxlength="25" name="cab" placeholder="Input Nama Cabang" class="form-control" required="" >                                
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
 