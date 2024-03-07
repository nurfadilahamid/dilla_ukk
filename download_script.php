<?php
// Mendapatkan id_buku dari parameter yang dikirimkan
$id_buku = $_GET['id'];

// Misalnya, Anda dapat memeriksa izin pengguna di sini
// Jika pengguna memiliki izin, lanjutkan proses pengunduhan
// Jika tidak, mungkin Anda ingin mengarahkan pengguna ke halaman lain atau menampilkan pesan kesalahan.

// Misalnya, Anda mengambil file buku dari sistem penyimpanan file
// Di sini, kita akan anggap bahwa Anda memiliki fungsi getBookFilePath() untuk mendapatkan lokasi file buku berdasarkan id_buku
$filePath = getBookFilePath($id_buku);

if ($filePath !== false && file_exists($filePath)) {
    // Mengatur header HTTP untuk memberitahu browser bahwa file yang dikirim adalah file yang dapat diunduh
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
    header('Content-Length: ' . filesize($filePath));

    // Mengirimkan konten file ke output
    readfile($filePath);
    exit;
} else {
    // Jika file buku tidak ditemukan atau ada masalah lain dalam proses pengunduhan, Anda dapat menampilkan pesan kesalahan atau mengarahkan pengguna ke halaman lain.
    echo "File buku tidak ditemukan";
}
?>
