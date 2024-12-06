<?php

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../login/index.php");
	exit;
}

include "function.php";

if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambahProfile($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'profile.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'tambahProfil.php';
			</script>
		";
	}


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <section>
        <nav class="navbar navbar-expand-lg bg-success">
            <div class="container">
                <a class="navbar-brand d-flex" href="#">
                    <img src="../../image/DesaMangalle.png" style="width: 150px;" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-light" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class=" nav-link  text-light" href="../pesan/index.php">Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="berita.php">Berita & Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="activee nav-link text-light" href="../layouts/tentang.php">Profile</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Kelembagaan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Karang Taruna</a></li>
                                <li><a class="dropdown-item" href="#">PKK</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <div class="container mt-5" style="width: 60%;">
        <h3 class="text-center">Tambah Berita</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama">Judul  </label>
            <input type="text" class="form-control" name="nama" id="nama">

          

            <select name="statuss" id="statuss" class="form-select mt-2" aria-label="Default select example">
                <option value="1">ada</option>
                <option value="0">tidak ada</option>
            </select>

            <button type="submit" class="btn btn-success mt-2" name="submit">Tambah Data</button>
        </form>
    </div>

    <!-- js Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>