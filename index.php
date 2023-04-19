<?php
include '../koneksi.php';
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
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - COBIT 4.1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                        <h3 class="mt-1">Dashboard - <?= $_SESSION['level']; ?></h3>
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

            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- sales report area start -->
                <!-- Card -->
                <div class="container mt-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">ANALISA KUALITAS SISTEM INFORMASI MANAJEMEN KEPUASAN PELANGGAN DALAM PENGIRIMAN BARANG DI JNE KABUPATEN SIJUNJUNG DENGAN METODE COBIT MENGGUNAKAN BAHASA PEMROGRAMAN PHP DAN DATABASE MYSQL</h5>
                            <p class="card-text"></p>
                            <div class="card">

                                <div class="sales-report-area mt-5 mb-5">

                                    <div class="row">
                                        <!-- Card -->
                                        <div class="col-md-4">
                                            <div class="single-report mb-xs-30">
                                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                                    <div class="icon"><i class="fa fa-tachometer"></i></div>
                                                    <div class="s-report-title d-flex justify-content-between">
                                                        <h4 class="header-title mb-0">Data Indikator</h4>
                                                    </div>
                                                    <div class="d-flex justify-content-between pb-2">
                                                        <?php
                                                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_indikator");
                                                        $data = mysqli_num_rows($sql);
                                                        ?>
                                                        <h2><?= $data; ?></h2>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="single-report mb-xs-30">
                                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                                    <div class="icon"><i class="fa fa-question-circle"></i></div>
                                                    <div class="s-report-title d-flex justify-content-between">
                                                        <h4 class="header-title mb-0">Data Pertanyaan</h4>
                                                    </div>
                                                    <div class="d-flex justify-content-between pb-2">
                                                        <?php
                                                        $sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_pertanyaan");
                                                        $data2 = mysqli_num_rows($sql2);
                                                        ?>
                                                        <h2><?= $data2; ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="single-report mb-xs-30">
                                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                                    <div class="icon"><i class="fa fa-users"></i></div>
                                                    <div class="s-report-title d-flex justify-content-between">
                                                        <h4 class="header-title mb-0">Data Responden</h4>
                                                    </div>
                                                    <div class="d-flex justify-content-between pb-2">
                                                        <?php
                                                        $sql3 = mysqli_query($koneksi, "SELECT * FROM tbl_responden");
                                                        $data3 = mysqli_num_rows($sql3);
                                                        ?>
                                                        <h2><?= $data3; ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Card -->

                    <!-- End Card -->
                    <!-- sales report area end -->

                    <!-- row area start -->
                    <div class="row">

                    </div>
                </div>

            </div>
            <!-- main content area end -->

            <!-- FOOTER START -->
            <!-- FOOTER END-->
        </div>
        <?php
        include 'foot.php';
        ?>
        <!-- END CONTAINER -->
    </div>
</body>

</html>
<?php include 'footer.php'; ?>