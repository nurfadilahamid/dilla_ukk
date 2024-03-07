<?php if ($_SESSION['user']['level'] == 'admin') {?>
<?php
$id_user = $_SESSION['user']['id_user'];
$query = mysqli_query($koneksi, "SELECT*FROM user");

$row = [];

while ($result = mysqli_fetch_array($query)) {
    $row[] = $result;
}

?>
<h1 class="mt-4" align="center">User</h1>

<div class="card" style="background-color: #D0D3D4">
    <div class="card-body"> 
        <div class="row">
            <div class="col-md-12" >
            <a href="?page=user_tambah" class="btn btn-primary mb-2">+ Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No. telpon</th>
                        <th>Login Sebagai</th>
                        <th>Alamat</th>
                        <th>Email</th>
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
<td><?php echo isset($book['nama_lengkap']) ? $book['nama_lengkap'] : ''; ?></td>
<td><?php echo isset($book['username']) ? $book['username'] : ''; ?></td>
<td><?php echo isset($book['no_telpon']) ? $book['no_telpon'] : ''; ?></td>
<td><?php echo isset($book['level']) ? $book['level'] : ''; ?></td>
<td><?php echo isset($book['email']) ? $book['email'] : ''; ?></td>
<td><?php echo isset($book['alamat']) ? $book['alamat'] : ''; ?></td>
<td><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=user_hapus&&id=<?php echo $book['id_user']; ?>" class="btn btn-danger" style="background-color: #D2B48C">Hapus</a></td>


                            <!-- Cek apakah pengguna adalah admin -->
                        </tr>
                       
                    <?php
                            }
                    ?>
                    <?php }?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>