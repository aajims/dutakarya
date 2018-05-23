	<!DOCTYPE html>
	<html>
	<head>
	  <title><?=$title?></title>
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
	  </style>
	</head>
<body>
	<div>
	<h2 style="text-align: center"><strong>Laporan Order</strong></h2>
	</div>
	<div>
		<h4 align="center"><strong><?php echo "Periode ($tgl1) s/d  ($tgl2)"; ?></strong></h4>
	</div>
	<br /><br>	
		<table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
		      <thead>
		        <tr>
			<th>No  </th>
			<th>Kode Order </th>
			<th>Keterangan </th>
			<th>Nama Produk </th>
		    <th>Tgl Order</th>    
		    <th>Cabang</th>	
		        </tr>
		      </thead>
		      <tbody>
			<?php $no=1; foreach($record->result() as $row){ ?>
			<tr>
			   <td><?php echo $no;?></td>
			   <td><?php echo $row->kd_order;?></td>
			   <td><?php echo $row->ket;?></td>
		       <td><?php echo $row->nm_produk;?></td>
		       <td><?php echo tgl_indo($row->tgl_order);?></td>       
		       <td><?php echo $row->nm_cabang; ?></td>	
		       </td>       
			</tr>
			<?php $no++; }?>
		      </tbody>
		    </table>
		  </body>
		</html>
	<!DOCTYPE >	    
      