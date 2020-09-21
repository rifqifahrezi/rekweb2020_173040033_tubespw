<?php 

require '../../helper/functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM penemuterkenal WHERE 
		nama LIKE '%$keyword%' OR
		temuan LIKE '%$keyword%' OR
		tahunDitemukan LIKE '%$keyword%' ";

		$penemu = query($query);


 ?>

<div id="container">
	<table border="1" align="center">
		<tr>
			<th>#</th>
			<th>Opsi</th>
			<th>Potret Wajah</th>
			<th>Nama</th>
			<th>Temuan</th>
			<th>Tahun</th>
		</tr>
	<?php if (empty($penemu)): ?>
		<tr>
			<td colspan="7"> DATA TIDAK DITEMUKAN</td>
		</tr>
	<?php else: ?>
		<?php $i=1; ?>
		<?php foreach ($penemu as $key ) : ?>
			<tr>
				<td><?= $i?></td>
				<td>
					<a href="ubah.php?no=<?=$key['no'];?>">Ubah</a>
					<a href="hapus.php?no=<?=$key['no'];?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
				</td>
				<td><img src="../assets/img/<?= $key['gambar'];?>"></td>
				<td><?= $key['nama'];?></td>
				<td><?= $key['temuan'];?></td>
				<td><?= $key['tahunDitemukan'];?></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach ?>	
	<?php endif ?>
	</table>
</div>