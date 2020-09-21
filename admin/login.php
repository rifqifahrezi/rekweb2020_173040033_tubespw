<?php 
session_start();	
require '../helper/functions.php';
$conn = mysqli_connect("localhost","root","") or die("Koneksi Ke DB Gagal");
	mysqli_select_db($conn,"173040033") or die("Database salah!");
	
	if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) 
	{
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
		$row = mysqli_fetch_assoc($result);

		if ($key === hash('sha256', $row['username'])) {
			$_SESSION['login'] = true;
		}
	}
	if (isset($_SESSION["login"])) 
	{
		header("Location: index.php");
		exit;
	}

	
	

	if(isset($_POST["submit"])) 
	{
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
			if( password_verify($password, $row["password"])){
				
				$_SESSION["login"] = true;

				if (isset($_POST["remember"])) 
				
				{

				setcookie('id',$row['id'],time() + 300);
				setcookie('key',hash('sha256', $row['username']), time() + 300);
				}

				header("Location: index.php");
				exit;
			}
		}

		$error = true;
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/indexx.css">
</head>
<body>
	<header>
    <div class="nav">
      <ul>
        <li class="home"><a href="#">Muhammad Rifqi</a></li>
        <li><a href=""></a></li>
       <li class="tutorials"><a href="../index.php" >BACK</a></li>
      </ul>
    </div>
  </header> 

	<form method="post" class="logon" action="">
		<table align="center">
			
			<tr>
		<td><label>USERNAME:</label></td>
		<td><input type="text" name="username" id="username" class="username"></td><br>
			</tr>
			<tr>
		<td><label>PASSWORD:</label></td>
		<td><input type="password" name="password" id="password" class="password"></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="remember" id="remember" class="remember">
		<label style="font-size: 12px;">Remember me :</label></td>
		
		</tr>
		<tr>
			<td><?php if (isset($error)): ?>
			<p>Username atau Password salah</p>
		<?php endif ?></td>
		</tr>
		<tr>
			<td><button type="submit"  name="submit" id="submit" >Submit</button>
			<button><a href="registrasi.php">registrasi</a></button>
			<button><a href="logout.php">logout</a></button></td>
		</tr>
	</table>
	</form>

</body>
</html>