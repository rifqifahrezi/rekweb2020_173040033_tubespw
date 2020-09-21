<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.isi
		{
			margin: auto;
		}
		.konten
		{
			margin: auto;
			text-align: center;
			font-size: 30px;
		}
		.konten img
		{
			border-radius: 2000px;
		}
	</style>
		<link rel="stylesheet" type="text/css" href="../assets/css/indexx.css">
</head>
<body>
<div class="isi">
<div class="konten">
<?php 

$_GET['Nama'];

echo " Nama : ".$_GET['Nama'];
echo "<br>Temuan : ".$_GET['Temuan'];	  
echo "<br>Tahun ditemukan : ".$_GET['Tahun'];
 ?>
 <br>
<img src="../assets/img/<?= $_GET["Gambar"];?>">
<br>
<a href="../index.php">kembali ke index</a>

</div>
</div>
</body>
</html>