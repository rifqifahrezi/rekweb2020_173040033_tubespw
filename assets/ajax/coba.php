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
<?php endif ?></div>