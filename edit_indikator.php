<?php
include '../koneksi.php';
$idk = $_GET['id'];
session_start();
if (empty($_SESSION['level'])) {
?>
    <script>
        alert('Anda Harus Login Terlebih Dahulu!');
        document.location.href = '../login.php';
    </script>
<?php
} elseif (empty($_SESSION['level'])) {
?>
    <script>
        alert('Anda Harus Login Terlebih Dahulu!');
        document.location.href = '../login.php';
    </script>
<?php
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COBIT 4.1</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">

        <!-- SIDEBAR START -->
        <?php include 'sidebar.php'; ?>
        <!-- END SIDEBAR -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <h3 class="mt-1">Indikator - <?= $_SESSION['level']; ?></h3>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <!-- Gambar Admin -->
                            <img class="avatar user-thumb" src="../assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->

            <!-- page title area end -->

            <div class="main-content-inner">

                <div class="sales-report-area mt-1 mb-5">
                    <!-- Basic Card Example -->


                    <!-- Tampil Data  -->
                    <div class="card shadow mt-3 mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Indikator</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            include '../koneksi.php';
                            $qq = mysqli_query($koneksi, "SELECT * FROM tbl_indikator WHERE id_indikator = '$idk'");
                            $dd = mysqli_fetch_assoc($qq);
                            ?>
                            <form action="" method="POST">
                                <input type="hidden" class="form-control" name="idk" value="<?php echo $dd['id_indikator']; ?>" readonly="">
                                <div class="form-group">
                                    <label>Kode Indikator</label>
                                    <input type="text" class="form-control" name="kode" value="<?php echo $dd['kode_indikator']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Nama Indikator</label>
                                    <input type="text" class="form-control" name="nama" value="<?php echo $dd['nama_indikator']; ?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="edit" class="btn btn-md btn-success">Edit</button>
                                    <button type="reset" name="reset" class="btn btn-md btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_POST['edit'])) {

                $idk    = $_POST['idk'];
                $kode    = $_POST['kode'];
                $nama     = $_POST['nama'];

                $update = mysqli_query($koneksi, "UPDATE tbl_indikator SET kode_indikator = '$kode', nama_indikator = '$nama'WHERE id_indikator = '$idk'");
                if ($update) {
                    echo "<script language=javascript>
          window.alert('Berhasil Mengedit!');
          window.location='data_indikator.php';
          </script>";
                } else {
                    echo "<script language=javascript>
          window.alert('Gagal Mengedit!');
          window.location='data_indikator.php';
          </script>";
                }
            }
            ?>
</body>

</html>


<?php
include 'footer.php';
?>