<?php 
session_start();

include '../funcion.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		var_dump($row["password"]);
		$hash = password_hash($password, PASSWORD_DEFAULT); 
		var_dump($hash);
		if( password_verify($password, $row["password"]) ) {
			// set session
			var_dump($result);
			$_SESSION["login"] = true;

			header("Location: ../berita/berita.php");
			exit;
		} else{
			var_dump("password salah");
		}
	} 

	$error = true;

}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="d-flex justify-content-center mt-5 ">
	<img src="../../image/lutra.png" style="width: 10%;" alt="">
</div>
<h1  class="text-center">Desa Mangalle</h1>
<p class="text-center">Silahkan di isi untuk masuk</p>

<div class="d-flex justify-content-center align-items-center">
    <form action="" method="post" style="width: 40%;" >
            <div class="username">
                <label for="username" class="form-label">Username :</label>
                <input class="form-control" type="text" name="username" id="username">
            </div>
            <div class="password">
                <label for="password" class="form-label">Password :</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button class="btn btn-success mt-4" style="width: 100%;" type="submit" name="login">Login</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>
