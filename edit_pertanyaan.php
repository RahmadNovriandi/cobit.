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

                        <div class="text-center ml-3">
                            <h3>Bapenda Kota Padang</h3>
                        </div>
                    </div>

                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <!-- Fuul Screen -->
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <!-- End Full Screen -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Menu Admin -->
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <!-- Gambar Admin -->
                            <img class="avatar user-thumb" src="../assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Menu Admin -->
                </div>
            </div>
            <!-- page title area end -->

            <div class="main-content-inner">

                <div class="sales-report-area mt-5 mb-5">
                    <!-- Basic Card Example -->


                    <!-- Tampil Data  -->
                    <div class="card shadow mt-3 mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pertanyaan</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            include '../koneksi.php';
                            $qq = mysqli_query($koneksi, "SELECT * FROM tbl_pertanyaan a JOIN tbl_indikator b ON a.id_indikator = b.id_indikator WHERE a.id_pertanyaan = '$idk'");
                            $dd = mysqli_fetch_assoc($qq);
                            ?>
                            <form action="" method="POST">
                                <input type="hidden" class="form-control" name="idk" value="<?php echo $dd['id_pertanyaan']; ?>" readonly="">
                                <div class="form-group">
                                    <label>Kode Indikator</label>
                                    <select name="kode" id="" class="form-control " required>
                                        <option value="<?= $dd['id_indikator']; ?>"><?= $dd['nama_indikator'] . " (" . $dd['kode_indikator'] ?>)</option>
                                        <?php
                                        $sqlindikator = $koneksi->query("SELECT * FROM tbl_indikator");
                                        while ($arrayindikator = $sqlindikator->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $arrayindikator['id_indikator'] ?>"><?php echo $arrayindikator['kode_indikator'] . "-" . $arrayindikator['nama_indikator'] . " (" . $arrayindikator['kode_indikator']; ?>)</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pertanyaan</label>

                                    <textarea name="pertanyaan" id="" cols="30" rows="10" class="form-control" value="<?php echo $dd['pertanyaan']; ?>" required><?= $dd['pertanyaan']; ?></textarea>
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
                $pertanyaan     = $_POST['pertanyaan'];

                $update = mysqli_query($koneksi, "UPDATE tbl_pertanyaan SET id_indikator = '$kode', pertanyaan = '$pertanyaan' WHERE id_pertanyaan = '$idk'");
                if ($update) {
                    echo "<script language=javascript>
          window.alert('Berhasil Mengedit!');
          window.location='data_pertanyaan.php';
          </script>";
                } else {
                    echo "<script language=javascript>
          window.alert('Gagal Mengedit!');
          window.location='data_pertanyaan.php';
          </script>";
                }
            }
            ?>
</body>

</html>


<?php
include 'footer.php';
?>