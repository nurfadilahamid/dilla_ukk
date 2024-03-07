<?php
include "koneksi.php";
require_once "action.php";

$koneksi = new Connection();

$conn = $koneksi->getConn();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Ke Perpustakaan Digital</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="color" style="background-color: #E59866">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main> 
                <h2 align="center"><img src="assets/img/logo.png" alt="Logo Buku" width="30" height="30"> Perpustakaan Digital</h2>
                <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        h2 {
            font-size: 32px;
            color: #333;
            text-align: center;
            margin-top: 100px;
        }
        </style>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header" style="background-color:#D35400">
                                    <h3 class="text-center font-weight-light my-4">Masuk</h3>
                                </div>
                                <div class="card-body" style="background-color: #D35400">
                                    <?php
                                    if (isset($_POST['login'])) {
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        $data = mysqli_query($conn, "SELECT*FROM user where username='$username' and password='$password'");
                                        $cek = mysqli_num_rows($data);
                                        if ($cek > 0) {
                                            $_SESSION['user'] = mysqli_fetch_array($data);
                                            echo '<script>alert("Selamat datang, Login Berhasil"); location.href="index.php"</script>';
                                        } else {

                                            echo '<script>alert("Maaf, Username/Password salah")</script>';
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="inputEmail">Username</label>
                                            <input class="form-control" style="background-color: #EDBB99" id="inputusername" type="text" name="username" placeholder="Username" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input class="form-control" style="background-color: #EDBB99" id="inputPassword" type="password" name="password" placeholder="Password" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="login" value="login" href="index.html" style="background-color:#6E2C00">Masuk</button>
                                            <a class="btn btn-danger" href="register.php" style="background-color:#873600">Daftar</a>
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