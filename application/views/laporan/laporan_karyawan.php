<?php if($kar->num_rows() > 0) { ?>

	<table id="example1" class='table table-bordered'>
		<thead>
			<tr>
			  <th>No</th>
			  <th>NIK</th>                   
              <th>Nama Karyawan</th>	                          	                          
              <th>No Telp</th>
              <th>Tgl Lahir</th>	                          
              <th>Jabatan</th>
              <th>Akhir Kontrak</th>
              <th>Bekerja di</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;			
			foreach($kar->result() as $row)
			{
				echo "
					<tr>
						<td>".$no."</td>
						<td>".$row->kd_karyawan."</td>
						<td>".$row->nm_karyawan."</td>						
						<td>".$row->no_telepon."</td>
						<td>".tgl_indo($row->tgl_lahir)."</td>						
						<td>".$row->jabatan."</td>
						<td>".tgl_indo($row->akhir_kontrak)."</td>
						<td>".$row->nm_partner."</td>				
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
		<a href="<?php echo site_url('Laporan/laporan_pdf/'.$from.'/'.$to); ?>" target='blank' class='btn btn-default'><img width="45" height="45" src="<?php echo base_url(); ?>Admin/dist/img/pdf2.png"> Export ke PDF</a>		
	</p>
	<br />
<?php } ?>

<?php if($kar->num_rows() == 0) { ?>
<div class='alert alert-info'>
Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
</div>
<br />
<?php } ?>