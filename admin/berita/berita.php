<?php

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../login/login.php");
	exit;
}
    include "../funcion.php";

    $artickel = query("SELECT * FROM artickel ORDER BY id DESC");

    if(isset($_GET['id'])) {
        
        include "../funcion.php";
        // Panggil fungsi hapus
        $affected_rows = hapus($_GET['id']);

        // Tampilkan pesan berdasarkan hasil penghapusan
        if($affected_rows > 0) {
            echo "<p>Article deleted successfully.</p>";
        } else {
            echo "<p>Failed to delete article.</p>";
        }
    }


    if( isset($_POST["cari"]) ) {
        $artickel = cari($_POST["keyword"]);
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
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- css boastrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .btn.show-more {
        background-color: transparent;
        border: none;
        color: red; /* Ganti warna sesuai kebutuhan */
        cursor: pointer;
        font-size: 12px ;
        margin-left: -10px;
    }
</style>
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
                            <a class="activee nav-link  text-light" href="../pesan/index.php">Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../berita/berita.php">Berita & Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../profile/profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../lembaga/index.php">Kelembagaan</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <div class="container mt-3">
        <h2 class=" text-center">Berita & Kegiatan</h2>
        <div class="kepala ">
            <div class="mb-2 d-flex justify-content-between">
                    <form class="d-flex"  method="post">
                        <input class="form-control me-2" type="text" name="keyword" size="40" autofocus placeholder="pencarian.." autocomplete="off" id="keyword">
                        <button class="btn btn-outline-success" name="cari" id="tombol-cari" type="submit">Search</button>
                    </form>
                    <a href="tambahBerita.php" class="btn btn-success ms-auto">Tambah Data</a>
            </div>
        </div>
    <div style="max-height: 80vh; overflow-y: auto;">
        <table  class="table table-success table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            $i = 1;
             foreach($artickel as $artikel): ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $artikel['judul']; ?></td>
                    <td>
                        <?php 
                            $deskripsi = $artikel['deskripsi'];
                            if (strlen($deskripsi) > 50) {
                                $shortDesc = substr($deskripsi, 0, 70) ;
                                echo "<span class='short-text'>$shortDesc</span>";
                                echo "<span class='full-text' style='display:none;'>$deskripsi</span>";
                                echo "<button class='btn show-more'>selengkapnya...</button>";
                            } else {
                                echo "<span class='short-text'>$deskripsi</span>";
                            }
                        ?>
                    </td>
                    <td> 
                        <img class="zoomable "src="../../image/<?= $artikel["gambar"]; ?>" style="width: 100px;" alt="...">
                    </td>
                    <td class="">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="editBerita.php?id=<?= $artikel["id"]; ?>" class="btn btn-warning text-light"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger text-light" href="hapus.php?id=<?= $artikel["id"]; ?>" onclick="return confirm('yakin?');"><i class="bi bi-trash3-fill"></i></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
    </div>  
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tangkap semua tombol "Lebih Lengkap"
        var showMoreButtons = document.querySelectorAll('.show-more');

        showMoreButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var parentRow = button.closest('tr');
                var shortText = parentRow.querySelector('.short-text');
                var fullText = parentRow.querySelector('.full-text');

                // Toggle tampilan antara teks pendek dan teks lengkap
                if (shortText.style.display === 'none') {
                    shortText.style.display = 'inline';
                    fullText.style.display = 'none';
                    button.textContent = 'Lebih Lengkap';
                } else {
                    shortText.style.display = 'none';
                    fullText.style.display = 'inline';
                    button.textContent = 'Kurangi';
                }
            });
        });
    });
</script>

 <!-- js Bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
</body>

</html>