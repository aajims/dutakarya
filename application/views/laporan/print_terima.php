	<style>
	  table{
	      border-collapse: collapse;
	      width: 100%;
	      margin: 0 auto;
	  }
	  table th{
	      border:1px solid #000;
	      padding: 3px;
	      font-weight: bold;
	      text-align: center;
	  }
	  table td{
	      border:1px solid #000;
	      padding: 3px;
	      vertical-align: top;
	  }
	  footer{
	  	 border-collapse: collapse;
	      width: 100%;
	      margin: 0 auto;
	  }
	  </style>
	
  <title><?=$title?></title>  

	<div>
	<h2 style="text-align: center"><strong>Laporan Data MSDS</strong></h2>
	</div>
	<div>
		<h4 align="center"><strong><?php echo "Periode ($tgl1) s/d  ($tgl2)"; ?></strong></h4>
	</div>
		<p><h4 align="right">Tangerang, <?php echo $tgl; ?></h4>				
		<p align="right"><?php echo $nama; ?></p>			
		<table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
		      <thead>
		        <tr>
				<th>No</th>
				<th>No MSDS</th>
				<th>Kode Order</th>
				<th>Nama Produk</th>
				<th>Keterangan</th>
			    <th>Tgl terima</th>
			    <th>Tgl Order</th>
			    <th>Tgl Upload</th>
			    <th>Cabang</th>				
			        </tr>
			      </thead>
			      <tbody>
				 <?php
			$no = 1;			
			 foreach($record->result() as $row)
			{
				echo "
					<tr>
						<td>".$no."</td>
						<td>".$row->no_msds."</td>
						<td>".$row->kd_order."</td>						
						<td>".$row->nm_produk."</td>
						<td>".$row->ket."</td>						
						<td>".tgl_indo($row->tgl_terima)."</td>
						<td>".tgl_indo($row->tgl_order)."</td>
						<td>".tgl_indo($row->tgl_upload)."</td>
						<td>".$row->nm_cabang."</td>											
					</tr>
				";				
				$no++;	}	?>
		      </tbody>		      
		    </table><br />
		  <p><br>
  </p>
  <table align="left" width="490" border="1" cellspacing="0" cellpadding="0"><br />
	<tr>
		<td width="143" align="left">Prepared By</td>
		<td width="171" align="center">Checked By</td>
		<td width="176" align="center">Comfirmed By</td>
	</tr>
	
  	<tr><br /><br /><br /><br />
  		<td align="left"><p>&nbsp;</p>
	    <p>(  ..............  )</p></td>
  		<td align="center"><p>&nbsp;</p>
	    <p>(  ...............  )</p></td>
  		<td align="center"><p>&nbsp;</p>
	      <p>(  ...............  )</p></td>
  	</tr>
</table>	   
			    
      