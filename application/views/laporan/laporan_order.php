<?php if($order->num_rows() > 0) { ?>

	<table id="example1" class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Order </th>
				<th>Keterangan </th>
				<th>Nama Produk </th>
			    <th>Tgl Order</th>    
			    <th>Cabang</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;			
			foreach($order->result() as $row)
			{
				echo "
					<tr>
						<td>".$no."</td>
						<td>".$row->kd_order."</td>
						<td>".$row->ket."</td>
						<td>".$row->nm_produk."</td>						
						<td>".tgl_indo($row->tgl_order)."</td>
						<td>".$row->nm_cabang."</td>											
					</tr>
				";
				
				$no++;
			}

			?>
		</tbody>
	</table>

	<p>
		<?php
		$from 	= date('Y-m-d', strtotime($from));
		$to		= date('Y-m-d', strtotime($to));
		?>
		<a href="<?php echo site_url('order/laporan_pdf/'.$from.'/'.$to); ?>" target='blank' class='btn btn-default'><img width="45" height="45" src="<?php echo base_url(); ?>Admin/dist/img/pdf2.png"> Export ke PDF</a>		
	</p>
	<br />
<?php } ?>

<?php if($order->num_rows() == 0) { ?>
<div class='alert alert-info'>
Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
</div>
<br />
<?php } ?>