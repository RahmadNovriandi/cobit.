<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cobit 4.1</title>
</head>

<body>
    <?php
    include 'koneksi.php';
    include 'header.php';
    ?>
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
                        <h5 class="mt-2">JNE Cabang Muaro Bodi </h5>
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
                    <img src="./assets/images/b1.jpg" alt="" class="img-tentang">
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mb-5">
                    <div class="row">
                        <!-- Card -->
                        <div class="justify p-2">
                            <h4>Sejarah tentang JNE</h4>
                            <p class="mt-2">JNE didirikan pada tahun 1990. oleh Soeprapto Suparno bersama Johari Zein tepatnya pada tanggal 26 november. Perusahaan ini memulai kegiatannya dengan delapan karyawan dan bermodal awal 100 miliar rupiah. pada mulanya JNE hanya penanganan kegiatan ekspor dan impor seperti kepabeanan, jasa impor kiriman barang, dokumen eksport import serta pengirimannya dari luar negeri ke Indonesia.
                                <br><br>
                                Pada satu tahun sejak berdirinya PT. Tiki Jalur Nugraha Ekakurir. JNE mulai memperluas jaringan ke tingkat internasional. Salah satunya dengan bergabung sebagai anggota assosiasi perusahaan kurir di beberapa negara Asia (ACCA / Association Courier Conference of Asia).
                            </p>

                        </div>


                    </div>
                </div>
                <!-- End Card -->
                <!-- sales report area end -->

                <!-- row area start -->
                <div class="row">
                    <!-- Live Crypto Price area start -->
                    <div class="col-lg-4">
                        <!-- <h5>jkdjs</h5> -->
                    </div>


                </div>
            </div>

        </div>
        <!-- main content area end -->

        <!-- FOOTER START -->
        <?php
        include 'foot.php';
        ?>
        <!-- FOOTER END-->
    </div>
    <!-- END CONTAINER -->

</body>

</html>
<?php include 'footer.php'; ?>