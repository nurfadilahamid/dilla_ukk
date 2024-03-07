<h1 class="mt-4" align="center">Laporan Peminjaman Buku</h1>
<div class="card" style="background-color: #D0D3D4">
    <div class="card-body">

        <div class="row">
            <div class="col-md-12">
                <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print" style="background-color: #F4A460"></i> Cetak Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>no</th>
                        <th>Peminjam</th>
                        <th>Buku</th>
                        <th>tanggal Peminjaman</th>
                        <th>tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama_lengkap']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status_peminjaman']; ?><div class="row mb-3">
                            <td>
                                <?php
                                if ($data['status_peminjaman'] != 'dikembalikan') {
                                ?>
                                    <a href="?page=laporan_ubah&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-warning" style="background-color: #D2B48C"><i class="align-middle me-2" data-feather="edit"></i> <span class="align-middle" >Kembalikan</span></a>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=laporan_hapus&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger" style="background-color: #D2B48C"><i class="align-middle me-2" data-feather="trash-2"></i> <span class="align-middle">Hapus</span></a>
                                <?php
                                }
                                ?>
                            </td>
                        

                        <?php
                    }
                        ?>
                </table>
            </div>

        </div>
    </div>
</div>