<?php 
require 'helper/functions.php';
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
<html>
<head id="Home">
	<title>Tugas 3</title>
	<link rel="stylesheet" type="text/css" href="assets/css/indexx.css">
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
       <li class="tutorials"><a href="admin/login.php" >LOG IN</a></li>
      </ul>
    </div>
  </header> 

<div class="content" method='post' id="container">


	<?php if (empty($penemu)): ?>
		<tr>
			<td colspan="7"> DATA TIDAK DITEMUKAN</td>
		</tr>
	<?php else: ?>
<?php foreach ($penemu as $key) :  ?>
	<div class="foto">
		<img src="assets/img/<?= $key["gambar"];?>">
	
					
	<h4><a href="php/profil.php?Nama=<?= $key["nama"]; ?>& 
    	No=<?= $key["no"]; ?>&
        Nama=<?= $key["nama"]; ?>&
        Temuan=<?= $key["temuan"]; ?>&
        Tahun=<?= $key["tahunDitemukan"]; ?>&
        Gambar=<?= $key["gambar"]; ?>" 
        > <?= $key["nama"] ?>
	</a></h4>    
    <h5><?= $key["temuan"] ?></h5>
</div>   
<?php endforeach ?>
<?php endif ?>
</div>	

<script src="assets/js/coba.js"></script>
</body>
</html>