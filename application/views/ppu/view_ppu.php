<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">(PPU) Pengajuan Permintaan Uang</h3>
            </div>
              <?php if ($this->session->flashdata('success')): ?>
                  <div class="alert bg-success" role="alert">
                      <span><?php echo $this->session->flashdata('success'); ?></span>
                  </div>
              <?php endif; ?>
              <div class="box-body">
            <div class="box-header">
            <a class="btn btn-primary" href="<?php echo site_url(); ?>ppu/addview"><i class="glyphicon glyphicon-plus"></i> New PPU</a>
           	</div>
           	<br />
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
		<th>Action</th>
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
       <td>
       	<a class="btn btn-info" title="View Data" href="<?php echo site_url('ppu/vieww/'.$row->kode) ?>" ><i class="glyphicon glyphicon-search"></i></a>
        <a class="btn btn-danger" title="Delete Data" onclick="return confirm('Anda Yakin akan Hapus Data Ini.....??')" href="<?php echo site_url('ppu/delete/'.$row->kode) ?>" ><i class="glyphicon glyphicon-trash"></i></a>

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
        url : "<?php echo site_url('order/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_ppu"]').val(data.id_ppu);
            $('[name="kd"]').val(data.kd_order);
            $('[name="ket"]').val(data.ket);
            $('[name="produk"]').val(data.id_produk);
            $('[name="tglr"]').val(data.tgl_order);
          

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit order'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('ppu/tambah')?>";
      }
      else
      {
        url = "<?php echo site_url('ppu/update')?>";
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
            url : "<?php echo site_url('ppu/delete')?>/"+id,
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
  
  