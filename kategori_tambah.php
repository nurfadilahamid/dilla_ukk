  <h1 class="mt-4" align="center">Kategori Buku</h1>
  <div class="card"  style="background-color: #D0D3D4">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
      <form method="post">
        <?php
            if(isset($_POST['submit'])){
                $kategori = $_POST['kategori'];
                $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) values('$kategori')");

                if($query) {
                    echo '<script>alert("Tambah data berhasil.");</script>';
                }else{
                    echo '<script>alert("Tambah data gagal.");</script>';

                }
            }
        ?>
          <div class="row mb-3">
              <div class="col-md-2">Nama Kategori</div>
              <div class="col-md-8"><input type="text" class="form-control" name="kategori"></div>
          </div>
          <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit" style="background-color: #F4A460">Simpan</button>
                    <button type="reset" class="btn btn-secondary" style="background-color: #CD853F">Reset</button>
                    <a href="?page=kategori" class="btn btn-danger" style="background-color: #D2B48C">Kembali</a>
             </div>
          </div>
      </form>
    </div>
  </div>
</div>
</div>