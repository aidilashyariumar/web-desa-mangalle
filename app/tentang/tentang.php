<?php
// include "../componen/navbar.php";
include "../../admin/funcion.php";
$profil = query("SELECT * FROM profil ORDER BY id DESC LIMIT 12");

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
            <a class=" nav-link " href="../berita/berita.php">Berita & Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="activee nav-link " href="tentang.php">Tentang</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
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

 

  <section class="isi bg-success" style="height: 30vh;" >
    <div >
        <h2 class="text-center text-light p-5">Tentang Desa</h2>
    </div>
  </section>

  <div class="container text-center mt-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <img src="../../image/KADES.JPG" style="width: 80%;" alt="">
      </div>
      <div class="col">
        <h1 style="text-align: left;">Desa Mangalle</h1>
        <p style="text-align: justify;">
        "Daerah ini dikuasai oleh seorang penguasa bernama Andi Mangnguniang Opu To Angke Opu Balitare, sekitar 600 tahun lalu. Ia mendirikan rumah kerajaan di Mangalle, yang dikenal sebagai Saorajae. Dikenal dengan semboyan 'Mangalai Tang Ialai', wilayah ini kaya dengan buah-buahan seperti Durian dan Langsat. Sejak zaman merdeka, Mangalle termasuk dalam beberapa wilayah desa, dan pada tahun 1997 menjadi Desa Persiapan Mangalle. Desa ini terletak 8 km ke arah selatan dari Kota Kecamatan Mappedeceng, dengan luas 430 hektar. Pada akhir tahun 2018, penduduknya berjumlah 832 jiwa."
        </p>
      </div>
    </div>
  </div>

  <div class="container text-center mt-5">
    <div class="row d-flex align-items-center">
 
      <div class="col">
        <div class="visi">
            <h1 style="text-align: left;">Visi</h1>
            <p style="text-align: justify;">
            Terwujudnya Masyarakat Desa Mangalle yang berahlak Mulia, berinovasi Kreative, Amanah, Damai, Relegius dan Pencapaian Masyarakat yang Sehat 
            </p>
        </div>
        <div class="misi">
            <h1 style="text-align: left;">Misi</h1>
            <p style="text-align: justify;">
                1.	Meningkatkan dan menyelenggarakan  Pemerintahan Desa yang Efektif, Efisien dan mengutamakan  pada pelayanan Masyarakat yang Akumulatif 
            </p>
            <p style="text-align: justify;">
                2.	Peningkatan Pembangunan, Pemelliharaan Infrastruktur dan Sarana Prasarana disegala bidang yang melibatkan Masyarakat, berdasarkan dari hasil Musyawarah Dusun (MUSDUS) sampai dengan Musyawarah Rencana Pembangunan Desa (MUSRENBANGDES) 
            </p>
            <p style="text-align: justify;">
                3.	Menciptakan suasana rasa Aman dan Tentram dalam Kehidupan Masyarakat Desa yang Demokrasi, Agamis, dalam berpolitik/kekuasaan, hak dan kewajiban serta Hak Asasi Manuasia (HAM)
            </p>
            <p style="text-align: justify;">
                4.	Menggali Potensi Kualitas Sumber Daya Alam (SDA) yang ada, serta peningkatan Sumber Daya Manusia (SDM) yang Handal dan Religius  
            </p>
            <p style="text-align: justify;">
                5.	Melestarikan/Membangkitkan  semangat jiwa Kegotong-royongan Kebersihan Lingkungan
            </p>
            <p style="text-align: justify;">
                6.	Meningkatkan peran serta terutama Generasi Muda dan Masyarakat pada Umumnya untuk berinovasi dan berkreasi dalam peningkatan Pembangunan Desa dan
            </p>
            <p style="text-align: justify;">
                7.	Bertindak Cepat dalam mengambil kebijakan yang sesuai dengan keputusan bersama. 
            </p>
        </div>
      </div>
      <div class="col">
        <img src="../../image/posko7.JPG" style="width: 90%;" alt="">
      </div>
    </div>
  </div>

  <!-- Profile desa -->
  <section>
    <h2 class="text-center">Profile Desa</h2>
    <div class="container"  style="max-height: 70vh; overflow-y: auto;">
    <div class="row">
        <div class="col">
        <h3>Sarana & Prasarana</h3>
        <table  class="table table-success table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <?php
            $i = 1;
             foreach($profil as $prof): ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $prof['nama']; ?></td>
                    <td>
                        <?php 
                           $sts = $prof['statuss']; 
                           $keterangan = ($sts === 1) ? "tidak ada" : "ada";
                           echo $keterangan;
                        ?>
                    </td>
                </tr>
            </tbody>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
        </div>
        <div class="col">
        <h3 class="text-end">Kependudukan</h3>
        <table  class="table table-success table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <?php
            $i = 1;
             foreach($profil as $prof): ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $prof['nama']; ?></td>
                    <td>
                        <?php 
                           $sts = $prof['statuss']; 
                           $keterangan = ($sts === 1) ? "tidak ada" : "ada";
                           echo $keterangan;
                        ?>
                    </td>
                </tr>
            </tbody>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
        </div>
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