<?php
$id_user = $_SESSION['user']['id_user'];
$query = mysqli_query($koneksi, "SELECT*FROM koleksi_pribadi LEFT JOIN user ON user.id_user = koleksi_pribadi.id_user LEFT JOIN buku ON buku.id_buku = koleksi_pribadi.id_buku WHERE koleksi_pribadi.id_user = '$id_user'");

$row = [];

while ($result = mysqli_fetch_array($query)) {
    $row[] = $result;
}


?>

<h1 class="mt-4" align="center">Koleksi Pribadi</h1>
<div class="card">
    <div class="card-body"  style="background-color: #D0D3D4"> 
        <div class="row">
            <div class="col-md-12" >
                <a href="?page=koleksi_tambah" style="background-color: #CD853F" class="btn btn-primary">+ Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <!-- <th>Nama Kategori</th> -->
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>


                    </tr>
                        <tr><?php
                       
                        $i = 1;
                            // Misalkan ada variabel $isAdmin yang menunjukkan apakah pengguna adalah admin atau tidak
                            // $isAdmin = true; // Anda harus menggantinya dengan logika autentikasi yang sesungguhnya

                            foreach ($row as $book) {
                            ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
<td><?php echo isset($book['judul']) ? $book['judul'] : ''; ?></td>
<td><?php echo isset($book['penulis']) ? $book['penulis'] : ''; ?></td>
<td><?php echo isset($book['penerbit']) ? $book['penerbit'] : ''; ?></td>
<td><?php echo isset($book['tahun_terbit']) ? $book['tahun_terbit'] : ''; ?></td>
<td><?php echo isset($book['deskripsi']) ? $book['deskripsi'] : ''; ?></td>

                            <!-- Cek apakah pengguna adalah admin -->
                            <?php if ($_SESSION['user']['level'] == 'peminjam') : ?>
                                <td>
                                    <a href="?page=koleksi_hapus&&id=<?php echo $book['id_koleksi']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')" style="background-color: #D2B48C">Hapus</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php
                            }
                    ?>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>