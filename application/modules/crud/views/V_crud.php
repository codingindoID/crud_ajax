<!DOCTYPE html>
<html>
<head>
	<title>views</title>
</head>
<body>
	<form action="<?php echo base_url()."Crud/tambah_data" ?>" method="post">
		<table border="1px">
			<caption>tes</caption>
			<thead>
				<tr>
					<th>NO</th>
					<th>id</th>
					<th>nama</th>
					<th>warna</th>
					<th>harga</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				foreach ($tb_barang as $v) { ?>
					<tr>
						<td><?php echo  $no++ ?></td>
						<td><?php echo $v->id ?></td>
						<td><?php echo $v->nama ?></td>
						<td><?php echo $v->warna ?></td>
						<td><?php echo $v->harga ?></td>
						<td><a href="<?php echo "Crud/edit_data/".$v->id ?>">edit</a></td>
						<td><a href="<?php echo "Crud/hapus_data/".$v->id ?> ?>">hapus</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<input type="submit" name="" value="tambah data">
	</form>
	

</body>
</html>

