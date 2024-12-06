<?php
// Sertakan file koneksi ke basis data
include '../funcion.php'; // Pastikan nama file dan lokasinya sesuai dengan kebutuhan Anda

// Periksa apakah ada parameter 'id' yang dikirimkan melalui metode GET
if(isset($_GET['id'])) {
    // Tangkap nilai 'id' dari URL
    $id = $_GET['id'];

    // Panggil fungsi hapus untuk menghapus artikel dari basis data
    $affected_rows = hapus($id);

    // Periksa apakah penghapusan berhasil
    if($affected_rows > 0) {
        // Jika berhasil, arahkan kembali ke halaman lain atau tampilkan pesan sukses
        header("Location: berita.php"); // Misalnya, arahkan kembali ke halaman indeks
        exit;
    } else {
        // Jika gagal, tampilkan pesan kesalahan atau arahkan ke halaman lain
        echo "Gagal menghapus artikel.";
    }
} else {
    // Jika tidak ada parameter 'id' yang dikirimkan, tampilkan pesan kesalahan atau arahkan ke halaman lain
    echo "Tidak ada ID artikel yang dikirimkan.";
}
?>
