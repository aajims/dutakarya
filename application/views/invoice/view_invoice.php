<div class="col-xs-12">	
	<div class="box">
		<div class="box-header">
			<a class="btn btn-success" href="<?php echo site_url();?>invoice/add"><i class="glyphicon glyphicon-plus"></i> Add</a>
		</div>
		<br />
		<div class="box-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Karyawan</th>
						<th>Periode Karyawan</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php $i=1;?>
						<?php foreach ($invoice as $row):?>
						<td><?php echo $i?></td>
						<td><?php echo $row->nm_karyawan;?></td>
						<td><?php echo $row->periode?></td>
						<td><a href="<?php echo site_url('invoice/detail/'.$row->id_invoice);?>" class="btn btn-info"><i class="fa fa-search"></i></a></td>
						<?php $i++?>
						<?php endforeach;?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
