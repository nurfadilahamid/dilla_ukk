<h1 class="mt-4">Tambah Petugas</h1>
  <div class="card" style="background-color: #D0D3D4">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
      <form method="post">
        <?php
            if(isset($_POST['submit'])){
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                $level = $_POST['level'];
                $query = mysqli_query($koneksi, "INSERT INTO user (username, password, email, nama_lengkap, alamat, no_telpon, level) VALUES ('$username', '$password', '$email', '$nama', '$alamat', '0853', '$level')");


                if($query) {
                    echo '<script>alert("Tambah data berhasil.");</script>';
                    echo '<script>window.location.href = "index.php?page=user";</script>';
                    exit;
                }else{
                    echo '<script>alert("Tambah data gagal.");</script>';

                }
            }
        ?>
          <div class="row mb-3">
              <div class="col-md-2">Nama</div>
              <div class="col-md-8"><input type="text" class="form-control" name="nama"></div>
          </div>
          <div class="row mb-3">
              <div class="col-md-2">Username</div>
              <div class="col-md-8"><input type="text" class="form-control" name="username"></div>
          </div>
          <div class="row mb-3">
              <div class="col-md-2">Password</div>
              <div class="col-md-8"><input type="text" class="form-control" name="password"></div>
          </div>
          <div class="row mb-3">
              <div class="col-md-2">Email</div>
              <div class="col-md-8"><input type="text" class="form-control" name="email"></div>
          </div>
          <div class="row mb-3">
              <div class="col-md-2">Alamat</div>
              <div class="col-md-8"><input type="text" class="form-control" name="alamat"></div>
          </div>
          <div class="row mb-3">
              <div class="col-md-2">Kelas</div>
              <div class="col-md-8">
                <select name="level" class="form-control">
                  <option value="petugas">Petugas</option>
                  <option value="peminjaman">Peminjaman</option>
                </select>
              </div>
            </div>
          <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                    <button type="submit" class="btn btn-success" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <a href="?page=user" class="btn btn-danger">Kembali</a>
             </div>
          </div>
      </form>
    </div>
  </div>
</div>
</div>