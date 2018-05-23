	<div class="col-xs-12">	
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Data Staff</h3>
            </div>
            <div class="box-header">
           	<button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Add Staff</button>
           	</div>
           	<br />
            <div class="box-body">
               <div class="table-responsive"> 	
			    <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			      <thead>
			        <tr>
				<th>No  </th>
				<th>Username </th>
				<th>Nama Lengkap </th>
			    <th>No Telpon </th>
				<th>Email </th>
				<th>Level </th>
			    <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
					<?php $no=1; foreach($admin as $row){ ?>
				<tr>
				   <td><?php echo $no;?></td>
				   <td><?php echo $row->username;?></td>
			       <td><?php echo $row->nama_lengkap;?></td>
			       <td><?php echo $row->no_telp;?></td>
			       <td><?php echo $row->email;?></td>
			       <td><?php echo $row->level;?></td>
			         <td>
					<button class="btn btn-warning" onclick="edit_bid(<?php echo $row->id_admin;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
					<button class="btn btn-danger" onclick="delete_bid(<?php echo $row->id_admin;?>)"><i class="glyphicon glyphicon-trash"></i></button>
			         </td>
				</tr>
				<?php $no++; }?>
			      </tbody>
			      <tfoot>
			        <tr>
			       <th>No  </th>
					<th>Username </th>
					<th>Nama Lengkap </th>
				    <th>No Telpon </th>
					<th>Email </th>
					<th>Level </th>
			        </tr>
			      </tfoot>
			    </table>
			    </div>
			  </div>
			 </div> 
			</div>

<script type="text/javascript">
 (document).ready( function () {
      $('#example1').DataTable();
  } );
    var save_method; //for save method string
    var table;


    function add()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    
    }

    function edit_bid(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('staff/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_admin"]').val(data.id_admin);
            $('[name="user"]').val(data.username);
            $('[name="pass"]').val();
            $('[name="nama"]').val(data.nama_lengkap);
            $('[name="telp"]').val(data.no_telp);
			$('[name="email"]').val(data.email);
			$('[name="level"]').val(data.level);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Staff'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('staff/tambah')?>";
      }
      else
      {
        url = "<?php echo site_url('staff/update')?>";
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
                alert('Error adding / update data');
            }
        });
    }

    function delete_bid(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('staff/delete')?>/"+id,
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
                <h4 class="modal-title">Form Staff</h4>
              </div>
              <div class="modal-body form">           
          <div class="form-body">
          <form action="#" id="form" class="form-horizontal" onsubmit="save()">
          <input type="hidden" value="" name="id_admin"/>
            <div class="form-group">
              <label class="control-label col-md-3">Username </label>
              <div class="col-md-9">
                <input name="user" required="" placeholder="Input Username" class="form-control " type="text" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Password </label>
              <div class="col-md-9">
                <input name="pass"  placeholder="Input password" class="form-control" type="password" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama Lengkap </label>
              <div class="col-md-9">
                <input name="nama" required="" placeholder="Input Nama Lengkap" class="form-control" type="text" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">No Telp </label>
              <div class="col-md-9">
                <input name="telp" required="" placeholder="Input No Telepon" class="form-control" type="number" >
              </div>
            </div>
            <div class="form-group">
			<label class="control-label col-md-3">Email</label>
			<div class="col-md-9">
			<input name="email" required="" placeholder="Input Email" class="form-control" type="email" >
       	  </div>
			</div>
			<div class="form-group">
              <label class="control-label col-md-3">Level </label>
              <div class="col-md-9">
                <select class="form-control" name="level" >
                	<?php
			   $pilihan	= array("HRD", "GA", "Accounting", "FINANCE", "OPERASIONAL", "DIREKSI", "MANAGER", "admin");
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
 
 

 