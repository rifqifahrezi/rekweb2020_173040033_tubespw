 <?php 

	session_start();
	

	if (!isset($_SESSION["login"])) 
	{
		header("Location: login.php");
		exit;
	}

require '../helper/functions.php';

if (isset($_POST['ubah'])) 
{

	if (ubah($_POST) > 0) 
	{
		echo "<script>
			alert('Data Berhasil Diubah!');
			document.location.href = 'index.php';
			</script>";
	}
	else
	{
		echo "<script>
			alert('Data Gagal Diubah!');
			document.location.href = 'index.php';
			</script>";
	}
}

$no = $_GET['no'];
$penemu = query("SELECT * FROM penemuterkenal WHERE no='$no'")[0];
  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>

<form action="" method="post" class="form" enctype="multipart/form-data">
	<input class="form-control" type="hidden" name="no" value="<?php echo $penemu['no'];?>">
	<input class="form-control" type="hidden" name="gambarL" value="<?php echo $penemu['gambar'];?>">
	<label class="control-label"  for="nama">nama: </label><br>
	<input class="form-control" type="text" name="nama" id="nama" required value="<?php echo $penemu['nama'];?>"><br><br>
	<label class="control-label"  for="temuan">temuan: </label><br>
	<input class="form-control" type="text" name="temuan" id="temuan" value="<?php echo $penemu['temuan'];?>"><br><br>
	<label class="control-label"  for="tahun">tahun Ditemukan: </label><br>
	<input class="form-control" type="text" name="tahun" id="tahun" value="<?php echo $penemu['tahunDitemukan'];?>"><br><br>
	<label class="control-label"  for="gambar">gambar: </label><br>
	<img src="../assets/img/<?= $penemu['gambar']?>" width ="70">
	<input class="form-control" type="file" name="gambar" id="gambar" ><br><br>
	<button type="submit" name="ubah">Ubah</button>
	<button><a href="../admin/index.php">Kembali</a></button>
</form>

</body>
</html>