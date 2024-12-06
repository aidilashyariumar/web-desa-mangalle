<?php

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../login/login.php");
	exit;
}

    include "function.php";


    $kelembagaan = query("SELECT * FROM lembaga ORDER BY id DESC");

    if(isset($_GET['id'])) {
        
        include "function.php";
        // Panggil fungsi hapus
        $affected_rows = hapus($_GET['id']);

        // Tampilkan pesan berdasarkan hasil penghapusan
        if($affected_rows > 0) {
            echo "<p>Article deleted successfully.</p>";
        } else {
            echo "<p>Failed to delete article.</p>";
        }
    }


    if( isset($_POST["cariLembaga"]) ) {
        $kelembagaan = cariLembaga($_POST["keyword"]);
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
    <link rel="stylesheet" href="style.css">
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
                            <a class="nav-link text-light" href="../layouts/tentang.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php">Kelembagaan</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <div class="container mt-3">
        <h2 class=" text-center">Kelembagaan</h2>
        <div class="kepala ">
            <div class="mb-2 d-flex justify-content-between">
                    <form class="d-flex"  method="post">
                        <input class="form-control me-2" type="text" name="keyword" size="40" autofocus placeholder="pencarian.." autocomplete="off" id="keyword">
                        <button class="btn btn-outline-success" name="cariLembaga" id="tombol-cariLembaga" type="submit">Search</button>
                    </form>
                    <a href="tambahLembaga.php" class="btn btn-success ms-auto">Tambah Data</a>
            </div>
        </div>
    <div style="max-height: 70vh; overflow-y: auto;">
        <table  class="table table-success table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lembaga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">visi</th>
                    <th scope="col">misi</th>
                    <th scope="col">logo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            $i = 1;
             foreach($kelembagaan as $lembaga): ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $lembaga['namaLembaga']; ?></td>
                    <td>
                        <?php 
                            $deskripsi = $lembaga['deskripsi'];
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
                        <?php 
                            $visi = $lembaga['visi'];
                            if (strlen($visi) > 50) {
                                $shortDesc = substr($visi, 0, 70) ;
                                echo "<span class='short-text'>$shortDesc</span>";
                                echo "<span class='full-text' style='display:none;'>$visi</span>";
                                echo "<button class='btn show-more'>selengkapnya...</button>";
                            } else {
                                echo "<span class='short-text'>$visi</span>";
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            $misi = $lembaga['misi'];
                            if (strlen($misi) > 50) {
                                $shortDesc = substr($misi, 0, 70) ;
                                echo "<span class='short-text'>$shortDesc</span>";
                                echo "<span class='full-text' style='display:none;'>$misi</span>";
                                echo "<button class='btn show-more'>selengkapnya...</button>";
                            } else {
                                echo "<span class='short-text'>$misi</span>";
                            }
                        ?>
                    </td>
                    <td> 
                        <img class="zoomable "src="../../image/<?= $lembaga["logo"]; ?>" style="width: 100px;" alt="...">
                    </td>
                    <td class="">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="editLembaga.php?id=<?= $lembaga["id"]; ?>" class="btn btn-warning text-light"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger text-light" href="hapus.php?id=<?= $lembaga["id"]; ?>" onclick="return confirm('yakin?');"><i class="bi bi-trash3-fill"></i></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>

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