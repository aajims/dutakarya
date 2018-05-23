<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Data Request</h3>
            </div>
            <div class="box-header">           	
           	</div>           	
            <div class="box-body">
<?php
echo form_open('request/edit');
?>
<input type="hidden" value="<?php echo $row['id_order']?>" name="id">
<table class="table table-bordered">
    <tr><td width="130">Kode Order</td>
        <td><div class="col-sm-4""><input type="text" readonly name="kode" class="form-control"
                   value="<?php echo $row['kd_order']?>"></div>
       </td></tr>
       <tr><td width="130">Keterangan</td>
        <td><div class="col-sm-4""><input type="text" name="ket" readonly class="form-control"
                   value="<?php echo $row['ket']?>"></div>
       </td></tr>
       <tr><td width="130">Nama Produk</td>
        <td><div class="col-sm-4""><input type="text" name="ket" readonly class="form-control"
                   value="<?php echo $row['id_produk']?>"></div>
       </td></tr>
       <tr><td width="130">Tanggal Order</td>
        <td><div class="col-sm-4""><input type="text" name="ket" readonly class="form-control"
                   value="<?php echo tgl_indo($row['tgl_order'])?>"></div>
       </td></tr>
    <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Update</button> 
        <?php echo anchor('request','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
</table>
</form>
</div>
</div>
</div>