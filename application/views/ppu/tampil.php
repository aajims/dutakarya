	
	<table class="table table-striped" style="width: 75%">
        <thead>
            <tr>
            	<td>No</td>
                <td>Keterangan</td>
                <td>Jumlah</td>
                <td></td>
            </tr>
        </thead>
        <?php $no=1; $total=0;  foreach($tmp as $tmp){ ?>
        <tr>
        	<td><?php echo $no; ?></td>
            <td><?php echo $tmp->kete;?></td>
            <td><?php echo number_format($tmp->jumlah);?></td>
            <td><a title="Delete Data" onclick="return confirm('Anda Yakin akan Hapus Data Ini.....??')"  href="<?php echo site_url('ppu/delete_tmp/'.$tmp->id_tmp); ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php  $total += $tmp->jumlah;  $no++;} ?>
        <tr>
           <td colspan="2"><strong>Total</strong></td>
		  	<td><strong>Rp. <?php echo number_format($total, 0, ',', '.') ?>,-</strong></td>
        </tr>
    </table>