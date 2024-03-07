<?php
require_once 'graph.php';

$senin = date('Y-m-d', strtotime('monday this week'));
$minggu = date('Y-m-d', strtotime('sunday this week'));

$row = graph($senin, $minggu);

?>
<h1 class="mt-4" align="center" >Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <?php if($_SESSION['user']['level'] != 'peminjam') : ?>
    <div class="col-xl-3 col-md-6">
        <div class="card text-white mb-4" style="background-color: #D0D3D4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategori"));
                ?>
                Total Kategori Buku</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched" href=""></a>
    
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card text-white mb-4" style="background-color:#D0D3D4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                ?>
                Total Buku</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched" href=""></a>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="col-xl-3 col-md-6">
        <div class="card text-white mb-4" style="background-color: #D0D3D4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan"));
                ?>
                Total Ulasan</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched" href=""></a>
            </div>
        </div>
    </div>
    <?php
    if($_SESSION['user']['level'] == 'peminjam'){
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="cardtext-white mb-4" style="background-color: #D0D3D46">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM koleksi_pribadi"));
                ?>
                Total Koleksi pribadi</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched" href=""></a>
            </div>
        </div>
    </div>
</div>
<?php
    }
    ?>
<?php
if($_SESSION['user']['level'] != 'peminjam'){
    ?>
<div class="col-xl-3 col-md-6">
    <div class="card text-white mb-4" style="background-color: #D0D3D4">
        <div class="card-body">
            <?php
            echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
            ?>
            <?php
            if($_SESSION['user']['level'] != 'peminjam'){}
            ?>
            Total User</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#"></a>
            <div class="small text-white"></i></div>
        </div>
    </div>
</div>
<?php
}
?>



<div class="card"  style="background-color: #D0D3D4">
    <div class="card-body">
        <table class="table table-bordered">

            <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['user']['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td width="200">Level User</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['user']['level']; ?></td>
            </tr>
            <tr>
                <td width="200">Tanggal Login</td>
                <td width="1">:</td>
                <td><?php echo date('d-m-Y'); ?></td>
            </tr>

        </table>
    </div>
</div>
<h3 align="center">Grafik</h3>
<div class="card mb-4" style="background-color:#D0D3D4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                statistik
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>