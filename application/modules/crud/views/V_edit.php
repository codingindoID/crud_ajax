<!DOCTYPE html>
<html>
<head>
	<title>Edit data</title>
</head>
<body>
	<?php foreach ($tb_barang as $v) { ?>
	<form action="<?php echo base_url()."Crud/aksi_update" ?>" method="post">
		<table>
			
				<tbody>
					<tr>
						<td><input type="text" name="id" hidden="true" value="<?php echo $v->id ?>" ></td>	
					</tr>
					<tr>
						<td><input type="text" name="nama" value="<?php echo $v->nama ?>" ></td>	
					</tr>
					<tr>
						<td><input type="text" name="warna"value="<?php echo $v->warna ?>"></td>	
					</tr>
					<tr>
						<td><input type="text" name="harga" value="<?php echo $v->harga ?>"></td>
					</tr>
					<tr>
						<td><input type="submit" value="ubah data"></td>	
					</tr>
				</tbody>

		</table>
	</form>
	<?php } ?>
</body>
</html>