<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../login/login.php");
	exit;
}
    include "../funcion.php";
    $pesan = query("SELECT * FROM pesan");

    function cariPesan($keyword) {
        $query = "SELECT * FROM pesan
                    WHERE
                  nama LIKE '%$keyword%' OR
                  wa LIKE '%$keyword%' OR
                  instansi LIKE '%$keyword%' OR
                  deskripsi LIKE '%$keyword%'
                ";
        return query($query);
    }

    if( isset($_POST["cariPesan"]) ) {
        $pesan = cariPesan($_POST["keyword"]);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="berita.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
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
                            <a class="activee nav-link  text-light" href="index.php">Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../berita/berita.php">Berita & Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../layouts/tentang.php">Profile</a>
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
    <div class="container mt-5">
        <div class="kepala ">
            <div class="mb-2 d-flex justify-content-between">
                <h2 class="mb-3 text-center">Pesan</h2>
                <form class="d-flex" role="search" method="post">
                    <input class="form-control me-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
                    <button class="btn btn-outline-success" name="cariPesan" type="submit">Search</button>
                </form>
            </div>
        </div>
        <table class="table table-success table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Wa/TLPN</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">Deskripsi</th>
                </tr>
            </thead>
            <?php
            $i = 1;
             foreach($pesan as $artikel): ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $artikel['nama']; ?></td>
                    <td><?= $artikel['wa']; ?></td>
                    <td><?= $artikel['instansi']; ?></td>
                    <td><?= $artikel['deskripsi']; ?></td>
                </tr>
            </tbody>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
    </div>
</body>

</html>