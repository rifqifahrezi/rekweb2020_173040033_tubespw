<?php 
	session_start();
	

	if (!isset($_SESSION["login"])) 
	{
		header("Location: login.php");
		exit;
	}
require '../helper/functions.php';
if (isset($_POST['cari'])) 
{
	$penemu = cari($_POST["keyword"]);
}
else
{
	$penemu = query("SELECT * FROM penemuterkenal");
}


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Penemu</title>
	<style type="text/css">
		table img
		{
			border-radius: 2000px;
			width: 90px;
			height: 90px;
		}
	</style>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/indexx.css">
</head>
<body>

<header>
    <div class="nav">
      <ul>
        <li class="home"><a href="#">Muhammad Rifqi</a></li>
       
        
       	<li><form method="post">
		<li><input placeholder="Search" type="text" name="keyword" id="keyword" size="40" autofocus autocomplete="off"></li>
		<li><button type="submit" name="cari" id="cari"  class="right">CARI</button></li>
		<li></form></li>
       <li class="tutorials"><a href="logout.php" >LOG OUT</a></li>
       <li><a href="tambah.php">Tambah Data</a></li>
      </ul>
    </div>
  </header>
	
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
<script src="../assets/js/bebas.js"></script>
</body>
</html>