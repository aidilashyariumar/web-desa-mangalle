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

function tambahProfile($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$statuss = htmlspecialchars($data["statuss"]);
	


	$query = "INSERT INTO profil (nama,statuss) VALUES ('$nama','$statuss')";
	if (mysqli_query($conn, $query)) {
		echo "Data berhasil ditambahkan";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['logo']['name'];
	$error = $_FILES['logo']['error'];
	$tmpName = $_FILES['logo']['tmp_name'];

	// cek apakah tidak ada logo yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('Pilih logo terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah logo
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('Yang anda upload bukan logo!');
			  </script>";
		return false;
	}

	// generate nama logo baru
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
    $stmt = mysqli_prepare($conn, "DELETE FROM lembaga WHERE id = ?");
    
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
	$nama = htmlspecialchars($data["nama"]);
	$statuss = htmlspecialchars($data["statuss"]);
	$visi = htmlspecialchars($data["visi"]);
	$misi = htmlspecialchars($data["misi"]);
	$logoLama = htmlspecialchars($data["logoLama"]);

	// cek apakah user pilih logo baru atau tidak
	if( $_FILES['logo']['error'] === 4 ) {
		$logo = $logoLama;
	} else {
		$logo = upload();
		if ($logo === false) {
			// Handle error saat upload
			return false;
		}
	}

	$query = "UPDATE lembaga SET
				nama = '$nama',
				statuss = '$statuss',
				visi = '$visi',
				misi = '$misi',
				logo = '$logo'
			  WHERE id = '$id'
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	

}

function cariLembaga($keyword) {
	$query = "SELECT * FROM lembaga
				WHERE
			  nama LIKE '%$keyword%' OR
			  statuss LIKE '%$keyword%' OR
			  visi LIKE '%$keyword%' OR
			  misi LIKE '%$keyword%'
			";
	return query($query);
}




?>
