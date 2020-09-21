<?php 
function koneksi()
{
	$conn = mysqli_connect("localhost","root","") or die("Koneksi Ke DB Gagal");
	mysqli_select_db($conn,"173040033") or die("Database salah!");
	return $conn;
}

function  query($sql)
{
	$conn = koneksi();
	$result = mysqli_query($conn,"$sql");

	$rows = [];
	while($row = mysqli_fetch_assoc($result))
	{
		$rows[]= $row;
	}
	return $rows;
}


function tambah($data)
{
	$conn = koneksi();
	$nama = htmlspecialchars($data['nama']);
	$temuan = htmlspecialchars($data['temuan']);
	$tahun = htmlspecialchars($data['tahun']);

	$gambar = upload();

	if (!$gambar) 
	{
		return false;
	}

	$querytambah = "INSERT INTO penemuterkenal
						VALUES ('','$nama','$temuan','$tahun','$gambar');";

	mysqli_query($conn, $querytambah);

	return mysqli_affected_rows($conn);
}

function upload()
{
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	if ($error === 4)
	{
		echo "<script>
		alert('pilih gambar terlebih dahulu');
		</script>";
		return false;
	}

	$ekstensiGV = ['jpg','jpeg','png'];
	$ekstensiG = explode('.', $namaFile);
	$ekstensiG = strtolower(end($ekstensiG));

	if (!in_array($ekstensiG, $ekstensiGV)) 
	{
		echo "<script>
		alert('file bukan jenis gambar');
		</script>";
		return false;
	}

	if ($ukuranFile >2000000) 
	{
		echo "<script>
		alert('ukuran gambar terlalu besar');
		</script>";
		return false;
	}

	$namaFileB = uniqid();
	$namaFileB .= '.';
	$namaFileB .= $ekstensiG;


	move_uploaded_file($tmpName, '../assets/img/'.$namaFileB);

	return$namaFileB;
}

function hapus($id)
{
	$conn = koneksi();
	mysqli_query($conn, "DELETE FROM penemuterkenal WHERE no=$id");

	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	$conn = koneksi();

	$no = $data['no'];
	$nama = htmlspecialchars($data['nama']);
	$temuan = htmlspecialchars($data['temuan']);
	$tahun = htmlspecialchars($data['tahun']);
	$gambarL = htmlspecialchars($data['gambarL']);

	if ($_FILES['gambar']['error'] === 4) 
	{
		$gambar = $gambarL;
	}
	else
	{
		$gambar = upload();
	}

	$queryubah= "UPDATE penemuterkenal
				SET 
				gambar='$gambar',
				nama='$nama',
				temuan='$temuan',
				tahunDitemukan='$tahun'
				WHERE no='$no'";

	mysqli_query($conn,$queryubah);

	return mysqli_affected_rows($conn);
}

function cari($keyword)
{
	$query = "SELECT * FROM penemuterkenal WHERE 
				nama LIKE '%$keyword%' OR 
				temuan LIKE '%$keyword%' OR 
				tahunDitemukan LIKE '%$keyword%'";

	return query($query);
}

function registrasi($data){
	$conn = koneksi();

	//username harus huruf kecil semua
	$username = strtolower(stripslashes($data["username"]));
	//password harus terdiri dari angka dan char tanpa spesial karakter
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 =  mysqli_real_escape_string($conn, $data["password2"]);

	//hasil yg diinputkan user = username di database
	$results = mysqli_query($conn,"SELECT username FROM user WHERE
		 username = '$username' ");
	//jika sudah ada di database
	if(mysqli_fetch_assoc($results)){
		echo "<script> 
		alert ('Username sudah terdaftar');
		</script>";

		return false;
	}

	//jika kolom username kosong tidak akan bisa di daftarkan
	if($username == is_null($username)){
		echo "<script> 
		alert ('konfirmasi username harus diisi');
		</script>";

		return false;
	}

	//jika password pertama dan kedua tidak sesuai maka gagal
	if($password !== $password2){
		echo "<script> 
		alert ('konfirmasi password tidak sesuai');
		</script>";

		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_query($conn, "INSERT INTO user VALUES
		('', '$username', '$password')");
		return mysqli_affected_rows($conn);


}

 ?>

