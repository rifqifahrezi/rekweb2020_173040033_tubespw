<?php 

require '../helper/functions.php';

if(isset($_POST['registrasi'])){

 if(registrasi($_POST)>0){
 	echo "<script>
 		alert('User Baru ditambahkan!');
    document.location.href = 'login.php';
 		</script>"	;
 } else {
    echo "<script>
        alert('User Gagal ditambahkan!');
    document.location.href = 'registrasi.php';
        </script>"  ;
 }

	}
?>

<!DOCTYPE html>
<html>
  <head>
    
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  </head>
<body>

            		<h3 class="panel-title">REGISTRASI ADMIN</h3>
          		    
            		    <form accept-charset="UTF-8" role="form" class="login-form" method="POST" action="">
                	
                    
                	       <label for="username" class="control-label">Username : </label>
                    	   <input class="form-control" type="text" name="username" id="username">
              		                		
                            <label for="password" class="control-label">Password : </label>
        		            <input class="form-control" type="password" name="password" id="password">
              		

                	        <label for="password2">Konfirmasi Password : </label>
                	        <input class="form-control" type="password" name="password2" id="password2">
              		
                <button type="submit" name="registrasi">Tambah</button>
				<a href="../index.php">Kembali</a>
                        </form>





   </body>
</html>