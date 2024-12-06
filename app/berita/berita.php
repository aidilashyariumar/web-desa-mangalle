<?php
// include "../componen/navbar.php";
include "../../admin/funcion.php";
$artickel = query("SELECT * FROM artickel ORDER BY id DESC LIMIT 12");
$lembaga = query("SELECT * FROM lembaga");

if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambahPesan($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
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
  <link href="../style.css" rel="stylesheet">
  <!-- icon bs -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand d-flex" href="#">
        <img src="../../image/DesaMangalle.png" style="width: 150px;" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link  " href="../index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="activee nav-link " href="berita.php">Berita & Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../tentang/tentang.php">Tentang</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Kelembagaan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../lembaga/lembaga.php?id=<?= $lembaga["1"]; ?>">Karang Taruna</a></li>
              <li><a class="dropdown-item" href="../lembaga/lembaga.php?id=<?= $lembaga["2"]; ?>">PKK</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 

  <section class="isi bg-success" style="height: 30vh;" >
    <div >
        <h2 class="text-center text-light pt-5">Berita & Kegiatan</h2>
    </div>
  </section>

  <section class=" mt-5">
    <div class="container d-flex justify-content-center  p-5">
      <div class="row d-flex justify-content-between g-3">
        <?php foreach($artickel as $artikel) : ?>
        <div class="col-12 col-md-4 col-lg-3">
          <div class="card h-100 " style="width: 18rem;">
            <img src="../../image/<?= $artikel["gambar"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= substr($artikel['judul'], 0, 30) ?>...</h5>
              <p class="card-text">
                <?= substr($artikel['deskripsi'], 0, 50) ?>...
              </p>
              <a href="beritaLengkap.php?id=<?= $artikel["id"]; ?>" class="btn btn-success">Selengkapnya</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

 
  <footer class="bg-success mt-5">
    <div class="container">
      <div class="logoLutra d-flex justify-content-center pt-5">
        <img src="../image/lutra.png" style="width: 100px;" alt="">
      </div>
      <h3 class="text-center text-light">Desa Mangalle</h3>
      <p class="text-center text-light">Desa mangalle terletak di provinsi sulawesi selatan kab luwu utara kec
        mappedeceng</p>
      <div class="sosmed text-light d-flex justify-content-evenly">
        <div class="ig d-flex  align-items-center">
          <div class="icon">
            <h5 class="bi bi-instagram "> </h5>
          </div>
          <div class="text-sosmed ms-2">
            <p>instagram</p>
            <p style="margin-top: -20px;">desaMangalle</p>
          </div>
        </div>
        <div class="ig d-flex  align-items-center">
          <div class="icon">
            <h5 class="bi bi-instagram "> </h5>
          </div>
          <div class="text-sosmed ms-2">
            <p>instagram</p>
            <p style="margin-top: -20px;">desaMangalle</p>
          </div>
        </div>
        <div class="ig d-flex  align-items-center">
          <div class="icon">
            <h5 class="bi bi-instagram "> </h5>
          </div>
          <div class="text-sosmed ms-2">
            <p>instagram</p>
            <p style="margin-top: -20px;">desaMangalle</p>
          </div>
        </div>
      </div>
      <div class="gariss container d-flex justify-content-between">
        <div class="d-flex">
          <a href="" style="text-decoration:none; color:white; ">Beranda</a>
          <a href="" style="text-decoration:none; color:white; margin-left:20px;">Berita & kegiatan</a>
          <a href="" style="text-decoration:none; color:white; margin-left:20px;">Profile</a>
        </div>
        <div class="copyRight">
          <p class="text-light">Copy Right &copy; KKN UINAM 74 MANGALLE</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- js Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
</body>

</html>