 <?php 

 	session_start();
	

	if (!isset($_SESSION["login"])) 
	{
		header("Location: login.php");
		exit;
	}
require '../helper/functions.php';

if (isset($_POST['tambah'])) 
{
	if (tambah($_POST) > 0) 
	{
		echo "<script>
			alert('Data Berhasil Ditambahkan!');
			document.location.href = 'index.php';
			</script>";
	}
	else
	{
		echo "<script>
			alert('Data Gagal Ditambahkan!');
			document.location.href = index.php';
			</script>";
	}
}
  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>

<form action="" method="post" class="form" enctype="multipart/form-data">
	<label class="control-label" for="nama">nama: </label><br>
	<input class="form-control" type="text" name="nama" id="nama" required><br><br>
	<label class="control-label" for="temuan">temuan: </label><br>
	<input class="form-control" type="text" name="temuan" id="temuan"><br><br>
	<label class="control-label" for="tahun">tahun Ditemukan: </label><br>
	<input class="form-control" type="text" name="tahun" id="tahun"><br><br>
	<label class="control-label" for="gambar">gambar: </label><br>
	<input class="form-control" type="file" name="gambar" id="gambar"><br><br>
	<button type="submit" name="tambah">Tambah</button>
	<button><a href="../admin/index.php">Kembali</a></button>
</form>

</body>
</html>