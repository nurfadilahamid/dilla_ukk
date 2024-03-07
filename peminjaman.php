<h1 class="mt-4" align="center">Laporan Peminjaman Buku </h1>
<div class="card" style="background-color: #D0D3D4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" >
                <a href="?page=peminjaman_tambah" class="btn btn-primary" style="background-color: #CD853F"><i class="fa fa-plus" ></i>Tambah Peminjaman</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user=" . $_SESSION['user']['id_user']);
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status_peminjaman']; ?></td>
                            <td>
                                <?php
                                if ($data['status_peminjaman'] != 'dikembalikan') {
                                ?> <?php
                                if ($_SESSION['user']['level'] == 'admin' || $_SESSION['user']['level'] == 'petugas') {?>
                                    <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-info" style="background-color: #CD853F">Ubah</a>
                                    <?php }?>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger" style="background-color: #D2B48C">Hapus</a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
</div>