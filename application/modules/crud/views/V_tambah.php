<!DOCTYPE html>
<html>
<head>
	<title>tambah data</title>
</head>
<body>
	<form action="<?php echo base_url()."Crud/aksi_tambah" ?>" method="post">
		<table>
			<tbody>
				<tr>
					<td><input type="text" name="nama" placeholder="nama barang" value=""></td>	
				</tr>
				<tr>
					<td><input type="text" name="warna" placeholder="warna" value=""></td>	
				</tr>
				<tr>
					<td><input type="text" name="harga" placeholder="Rp. harga" value=""></td>
				</tr>
				<tr>
					<td><input type="submit" value="tambah"></td>	
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>