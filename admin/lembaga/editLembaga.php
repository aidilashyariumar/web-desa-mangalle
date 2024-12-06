<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../login/login.php");
	exit;
}
include 'function.php'; // 

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$data = query("SELECT * FROM lembaga WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST)) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edit Berita</title>
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
                            <a class="activee nav-link  text-light" href="../pesan/index.php">Pesan</a>
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
<div class="container mt-5" style="width: 60%;">
    <h3 class="text-center">Edit Berita</h3>
    <form action="" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $data["id"]; ?>">
		<input type="hidden" name="logoLama" value="<?= $data["logo"]; ?>">

        <label for="namaLembaga">Nama Lembaga</label>
        <input type="text" class="form-control" name="namaLembaga" id="namaLembaga" value="<?php echo $data['namaLembaga']; ?>"> <!-- Nilai judul yang sudah ada -->

        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" rows="3"><?php echo $data['deskripsi']; ?></textarea> <!-- Nilai deskripsi yang sudah ada -->

        <label for="visi" class="form-label">Visi</label>
        <textarea type="text" class="form-control" name="visi" id="visi" rows="3"><?php echo $data['visi']; ?></textarea> <!-- Nilai deskripsi yang sudah ada -->

        <label for="misi" class="form-label">Misi</label>
        <textarea type="text" class="form-control" name="misi" id="misi" rows="3"><?php echo $data['misi']; ?></textarea> <!-- Nilai deskripsi yang sudah ada -->

        <label for="logo">Logo </label>
        <div class="m-2">
            <img src="../../image/<?=$data['logo']; ?>" width="100"> <br>
        </div>
        <input type="file" class="form-control" name="logo" id="logo"> <!-- Input untuk logo baru, jika ingin diubah -->

        <button type="submit" class="btn btn-success mt-2" name="submit">Edit Data</button>
    </form>
</div>

</body> 
</html>
