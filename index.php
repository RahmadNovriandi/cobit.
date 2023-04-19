<?php
include '../koneksi.php';
session_start();
if ($_SESSION['level'] == "") {
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
    <title>COBIT </title>
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


                    </div>

                    <!-- profile info & task notification -->
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <!-- Gambar Admin -->
                            <img class="avatar user-thumb" src="../assets/images/responden.jpg" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['nama']; ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- sales report area start -->
                <!-- Card -->
                <div class="container mt-2">
                    <div class="card text-center">
                        <center><img src="../assets/images/icon.png" alt="Bapenda Kota Padang" width="300px;"></center>
                        <div class="card">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ANALISA KUALITAS SISTEM INFORMASI MANAJEMEN KEPUASAN PELANGGAN DALAM PENGIRIMAN BARANG DI JNE KABUPATEN SIJUNJUNG DENGAN METODE COBIT MENGGUNAKAN BAHASA PEMROGRAMAN PHP DAN DATABASE MYSQL</h5>
                            <p class="card-text"></p>
                            <h4 class="text-center ">Selamat Datang Responden <?php echo $_SESSION['nama']; ?></h4>

                        </div>
                    </div>

                    <!-- End Card -->

                    <div class="sales-report-area mt-5 mb-5">


                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- main content area end -->

        <!-- FOOTER START -->
        <?php
        include '../foot.php';
        ?>
        <!-- FOOTER END-->
    </div>
    <!-- END CONTAINER -->

</body>

</html>
<?php include 'footer.php'; ?>