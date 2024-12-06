<?php
$servername ="localhost"; // Ganti dengan nama server database Anda
$username ="root"; // Ganti dengan nama pengguna database Anda
$password =""; // Ganti dengan kata sandi database Anda
$database ="desa-mangalle"; // Ganti dengan nama database yang ingin Anda gunakan

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function tambahArtikel($data) {
	global $conn;

	$judul = htmlspecialchars($data["judul"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO artickel (judul, deskripsi, gambar) VALUES ('$judul','$deskripsi','$gambar')";
	if (mysqli_query($conn, $query)) {
		echo "Data berhasil ditambahkan";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	return mysqli_affected_rows($conn);
}
function tambahPesan($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$wa = htmlspecialchars($data["wa"]);
	$instansi = htmlspecialchars($data["instansi"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);

	
	$query = "INSERT INTO pesan (nama,wa,instansi,deskripsi) VALUES ('$nama','$wa','$instansi','$deskripsi')";
	if (mysqli_query($conn, $query)) {
		echo "Data berhasil ditambahkan";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('Yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../../image/' . $namaFileBaru);

	return $namaFileBaru;
}
function query($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id) {
    global $conn;
    
    // Persiapkan statement untuk menghapus data dengan parameter (?)
    $stmt = mysqli_prepare($conn, "DELETE FROM artickel WHERE id = ?");
    
    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    // Jalankan statement
    mysqli_stmt_execute($stmt);
    
    // Periksa jumlah baris yang terpengaruh
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    
    // Tutup statement
    mysqli_stmt_close($stmt);
    
    return $affected_rows;
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$judul = htmlspecialchars($data["judul"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
		if ($gambar === false) {
			// Handle error saat upload
			return false;
		}
	}

	$query = "UPDATE artickel SET
				judul = '$judul',
				deskripsi = '$deskripsi',
				gambar = '$gambar'
			  WHERE id = '$id'
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	

}

function cari($keyword) {
	$query = "SELECT * FROM artickel
				WHERE
			  judul LIKE '%$keyword%' OR
			  deskripsi LIKE '%$keyword%'
			";
	return query($query);
}




?>
