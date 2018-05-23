
      <tbody>
	<?php $no=1; foreach($ppu_notif as $row){ ?>
	<tr>
	   <td><?php echo $no;?></td>
	   <td><?php echo $row->no_ppu;?></td>
	   <td><?php echo $row->ket;?></td>
	   <td><?php echo $row->tgl_pengajuan;?></td>

	</tr>
	<?php $no++; }?>
      </tbody>
