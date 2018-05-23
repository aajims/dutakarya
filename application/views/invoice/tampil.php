	
	<table class="table table-striped" style="width: 95%">
        <thead>
            <tr>
            	<td>No</td>
                <td>Tanggal</td>
                <td>Jam Masuk</td>
                <td>Jam Pulang</td>
                <td>Jam Lembur</td>
                <td>Total Lembur</td>
                <td>Nominal Lembur</td>
                <td>Keterangan</td>
                <td></td>
            </tr>
        </thead>
        <?php $no=1; foreach($tmp as $tmp){?>
        <tr>
        	<td><?php echo $no; ?></td>
            <td><?php echo tgl_indo($tmp->tgl); ?></td>
            <td><?php echo $tmp->jam_masuk; ?></td>
            <td><?php echo $tmp->jam_pulang; ?></td>
            <td><?php echo $tmp->jam_lembur; ?></td>
            <td><?php echo $tmp->total_lembur; ?></td>
            <td><?php echo $tmp->nom_lembur; ?></td>
            <td><?php echo $tmp->ket; ?></td>
            <td><a title="Delete Data" onclick="return confirm('Anda Yakin akan Hapus Data Ini.....??')"  href="<?php echo site_url('gaji/delete_tmp/'.$tmp->kode); ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php $no++; }?>
        <tr>

        </tr>
    </table>