<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Ke Perpustakaan Digital</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="color" style="background-color: #E59866">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header" style="background-color: #D35400">
                                    <h3 class="text-center font-weight-light my-4">Buat </h3>
                                </div>
                                <div class="card-body" style="background-color: #D35400">
                                    <?php
                                    if (isset($_POST['register'])) {
                                        $nama_lengkap = $_POST['nama_lengkap'];
                                        $email = $_POST['email'];
                                        $alamat = $_POST['alamat'];
                                        $no_telpon = $_POST['no_telpon'];
                                        $username = $_POST['username'];
                                        $level = $_POST['level'];
                                        $password = $_POST['password'];

                                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama_lengkap,email,alamat,no_telpon,username,password,level) VALUES('$nama_lengkap','$email','$alamat','$no_telepon','$username','$password','$level')");

                                        if ($insert) {
                                            echo '<script>alert("Selamat, register berhasil. Silahkan Login"); location.href="login.php"</script>';
                                        } else {
                                            echo '<script>alert("Register gagal, silahkan ulangi kembali.");</script>';
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="small mb-1">Nama Lengkap</label>
                                            <input class="form-control py-2" style="background-color: #EDBB99" type="text" required name="nama_lengkap" placeholder="Nama Lengkap" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Email</label>
                                            <input class="form-control py-2" style="background-color: #EDBB99" type="text" required name="email" placeholder="Email" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Alamat</label>
                                            <textarea name="alamat" rows="4" style="background-color: #EDBB99" required class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">No. Telpon</label>
                                            <input class="form-control py-2" style="background-color: #EDBB99" type="text" required name="no_telpon" placeholder="No. Telpon" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Username</label>
                                            <input class="form-control py-2" style="background-color: #EDBB99" id="inputusername" required type="username" name="username" placeholder="Username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-2" style="background-color: #EDBB99" id="inputPassword" required type="password" name="password" placeholder="Password" />
                                        </div>
                                        <input type="hidden" value="peminjam" name="level">
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="register" value="register" href="index.html" style="background-color:#6E2C00">Daftar</button>
                                            <a class="btn btn-danger" href="login.php" style="background-color:#873600">Masuk</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3" style="background-color: #D35400">
                                    <div class="small">
                                        &copy; NURFADILA HAMID
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>

</html>