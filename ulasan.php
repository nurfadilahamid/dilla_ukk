
<h1 class="mt-4">Ulasan Buku </h1>
<div class="card" style="background-color: #D0D3D4">
  <div class="card-body">
  <div class="row">
    <div class="col-md-12">
    <?php
    if($_SESSION['user']['level'] == 'peminjam'){
    ?>
        <a href="?page=ulasan_tambah" class="btn btn-primary" style="background-color: #CD853F">+ Tambah Data</a>
        <?php
    }
    ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Ulasan</th>
                <th>Rating</th>
                <?php if ($_SESSION['user']['level'] == 'admin' || $_SESSION['user']['level'] == 'petugas') {?>
                <th>Aksi</th>
                <?php }?>
            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN user on user.id_user = ulasan.id_user LEFT JOIN buku on buku.id_buku = ulasan.id_buku");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['ulasan']; ?></td>
                        <td><?php echo $data['rating']; ?></td>
                        <td>
                        <?php
                        if ($_SESSION['user']['level'] == 'admin' || $_SESSION['user']['level'] == 'petugas') {?>
                            <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-info" style="background-color: #CD853F"> Ubah</a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger" style="background-color: #D2B48C">Hapus</a>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
      
  </div>
    </div>
</div>