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
    <title>COBIT 4.1</title>
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
                        <h3 class="mt-1">Hasil Maturity - <?= $_SESSION['level']; ?></h3>
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

                <div class="sales-report-area mt-2 mb-5">
                    <!-- Basic Card Example -->

                    <!-- Tampil Data  -->
                    <div class="card shadow mt-3 mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Nilai Maturity</h6>
                        </div>
                        <div class="card-body">
                            <a href="laporan_maturity.php" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>

                            <div class="table-responsive mt-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Kode Indikator</th>
                                            <th>Total Menjawab Pertanyaan </th>
                                            <th>Jumlah Skor Indikator</th>
                                            <th>Nilai Index</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    $pbg = 0;
                                    $g = 0;
                                    include '../koneksi.php';
                                    $no = 1;
                                    // SQL data Indikator
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_index a JOIN tbl_indikator b ON a.id_indikator = b.id_indikator order by a.id_index ASC ");
                                    while ($array = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?></td>
                                                <td class="text-center"><?php echo $array['kode_indikator']; ?></td>
                                                <td class="text-center"><?php echo $array['total_pertanyaan']; ?></td>
                                                <td class="text-center"><?php echo $array['jml_skor_domain']; ?></td>
                                                <td class="text-center"><?php echo $array['index_sekarang']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php
                                        $pbg += 1;
                                        $g += $array['index_sekarang'];
                                    }
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="text-center"><strong>TOTAL</strong></td>
                                            <td class="text-center"><?= $g; ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="text-center"><strong>RATA RATA</strong></td>
                                            <td class="text-center"><?= number_format(($g / $pbg), 2); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FOOTER START -->
            <?php
            include 'foot.php';
            ?>
            <!-- FOOTER END-->
        </div>


        <!-- END CONTAINER -->
</body>
<?php include 'footer.php'; ?>