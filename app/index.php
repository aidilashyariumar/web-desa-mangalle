<?php
include "../componen/navbar.php";
include "../admin/funcion.php";
$artickel = query("SELECT * FROM artickel ORDER BY id DESC LIMIT 3");
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
  <link href="style.css" rel="stylesheet">
  <!-- icon bs -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-success">
    <div class="container">
      <a class="navbar-brand d-flex" href="#">
        <img src="../image/DesaMangalle.png" style="width: 150px;" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-light" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="activee nav-link  text-light" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="./berita/berita.php">Berita & Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="./tentang/tentang.php">Tentang</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light " href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Kelembagaan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="lembaga/lembaga.php?id=8">Karang Taruna</a></li>
              <li><a class="dropdown-item" href="lembaga/lembaga.php?id=8">Kelompok PKK</a></li>
              <li><a class="dropdown-item" href="lembaga/lembaga.php?id=8">Karang Taruna</a></li>
              <li><a class="dropdown-item" href="lembaga/lembaga.php?id=8">Karang Taruna</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <?php foreach ($artickel as $artikel): ?>
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="../image/<?= $artikel["gambar"]; ?>" style="height:93vh;" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-light"><?= substr($artikel['judul'], 0, 30) ?></h5>
          <p class="text-light"><?= substr($artikel['deskripsi'], 0, 50) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container text-center mt-5">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <img src="../image/lutra.png" style="width: 200px;" alt="">
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <h1 style="text-align: left;">Desa Mangalle</h1>
        <p style="text-align: justify;">
        "Daerah ini dikuasai oleh seorang penguasa bernama Andi Mangnguniang Opu To Angke Opu Balitare, sekitar 600 tahun lalu. Ia mendirikan rumah kerajaan di Mangalle, yang dikenal sebagai Saorajae. Dikenal dengan semboyan 'Mangalai Tang Ialai', wilayah ini kaya dengan buah-buahan seperti Durian dan Langsat. Sejak zaman merdeka, Mangalle termasuk dalam beberapa wilayah desa, dan pada tahun 1997 menjadi Desa Persiapan Mangalle. Desa ini terletak 8 km ke arah selatan dari Kota Kecamatan Mappedeceng, dengan luas 430 hektar. Pada akhir tahun 2018, penduduknya berjumlah 832 jiwa."
        </p>
        <a href="./tentang/tentang.php" class="btn btn-success text-start" >Selengkapnya</a>
      </div>
    </div>
  </div>
  <div class="container d-flex justify-content-center mt-5">
    <!-- <video controls width="840" height="560">
      <source src="../image/test.mp4" type="video/mp4">
      Sisipkan sumber video Anda di atas
      Browser Anda tidak mendukung pemutaran video.
    </video> -->
    <!-- <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe> -->
    <iframe width="760" height="415" src="https://www.youtube.com/embed/1JE4qonkjTo?si=QtmNayOWXSCQxLcU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

  </div>

  <section class="bg-success mt-5">
    <div class="container d-flex justify-content-center  p-5">
      <div class="row d-flex justify-content-between g-2">
        <?php foreach($artickel as $artikel) : ?>
        <div class="col">
          <div class="card h-100 " style="width: 18rem;">
            <img src="../image/<?= $artikel["gambar"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= substr($artikel['judul'], 0, 30) ?>...</h5>
              <p class="card-text">
                <?= substr($artikel['deskripsi'], 0, 50) ?>...
              </p>
              <a href="./berita/beritaLengkap.php?id=<?= $artikel["id"]; ?>" class="btn btn-success">Selengkapnya</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section>
    <div class="container mt-5" style="width: 70%;">
      <div class="garis" style="width: 60%; margin:0 auto;">
        <h2 class="text-center">Kirimkan Pesan Kepada Kami</h2>
      </div>
      <p class="text-center mb-3" style="width: 80%; margin: 0 auto;">kirimkan pesan kepada kami untuk berbagi
        informasi,permintaan, atau komentar apapun yang ingin anda sampaikan, kami dengan senang hati akan meresponnya.
      </p>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between">
          <div class="mb-3" style="width: 49%;">
            <label for="nama" class="form-label">Nama Lengkap*</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="nama">
          </div>
          <div class="mb-3" style="width: 49%;">
            <label for="wa" class="form-label">Telepon/Whatsapp</label>
            <input type="text" class="form-control" name="wa" id="wa" placeholder="instansi/asal">
          </div>
        </div>
        <div class="mb-3">
          <label for="instansi" class="form-label">Instansi/Asal</label>
          <input type="text" class="form-control" name="instansi" id="instansi" placeholder="instansi/asal">
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi*</label>
          <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-success" style="width: 100%;">Kirim</button>
    </div>
    </form>
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