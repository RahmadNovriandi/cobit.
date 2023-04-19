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
                        <h3 class="mt-1">Hasil Index - <?= $_SESSION['level']; ?></h3>
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

                <div class="sales-report-area mt-1 mb-5">
                    <!-- Basic Card Example -->

                    <!-- Tampil Data  -->
                    <div class="card shadow mt-3 mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Proses Index</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="m-0 font-weight-bold text-dark">Data Indikator</h4>
                            <div class="table-responsive mt-1">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Kode Indikator</th>
                                            <th>Nama Indikator</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    // SQL data Indikator
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_indikator order by id_indikator ASC ");
                                    while ($array = mysqli_fetch_assoc($sql)) {


                                    ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?></td>
                                                <td class="text-center"><?php echo $array['kode_indikator']; ?></td>
                                                <td><?php echo $array['nama_indikator']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>

                                <!-- Pertanyaan -->
                                <div class="table-responsive mt-2">
                                    <h4 class="m-0 font-weight-bold text-dark">Data Perhitungan Kuesioner</h4>
                                    <div class="table-responsive mt-2">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Nama Responden</th>
                                                    <?php
                                                    $np = 1;
                                                    $sqlth = $koneksi->query("SELECT * FROM tbl_pertanyaan");
                                                    while ($datath = $sqlth->fetch_array()) {
                                                    ?>
                                                        <th>P<?= $np; ?></th>
                                                    <?php
                                                        $np++;
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $sql3 = mysqli_query($koneksi, "SELECT DISTINCT * FROM tbl_jawaban a JOIN tbl_responden b ON a.id_responden = b.id_responden WHERE a.id_responden GROUP BY b.nama");
                                            while ($array3 = mysqli_fetch_assoc($sql3)) {
                                            ?>
                                                <tbody>

                                                    <!-- <button type="submit" name="proses1">Proses1</button> -->
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $array3['nama']; ?></td>
                                                        <?php
                                                        $sqltd = mysqli_query($koneksi, "SELECT * FROM tbl_jawaban WHERE id_responden = '$array3[id_responden]'");
                                                        while ($datatd = $sqltd->fetch_array()) {
                                                        ?>
                                                            <td><?= $datatd['nilai_angka']; ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                            }

                                                ?>
                                                <tr>
                                                    <td colspan="2" class="text-center"><strong>Jumlah</strong></td>
                                                    <?php
                                                    $sqltdf = mysqli_query($koneksi, "SELECT * FROM tbl_pertanyaan ORDER BY id_pertanyaan ASC");
                                                    while ($datatdf = $sqltdf->fetch_array()) {
                                                        $idprt = $datatdf['id_pertanyaan'];
                                                        $sqlcekprt = $koneksi->query("SELECT SUM(nilai_angka) as nprtr FROM tbl_jawaban WHERE id_pertanyaan = '$idprt'");
                                                        $dataprt = $sqlcekprt->fetch_array();
                                                    ?>
                                                        <td><strong><?= $dataprt['nprtr']; ?></strong></td>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-center"><strong>Total</strong></td>
                                                    <?php
                                                    $sqltdid = mysqli_query($koneksi, "SELECT * FROM tbl_indikator");
                                                    while ($datatdid = $sqltdid->fetch_array()) {
                                                        $idind = $datatdid['id_indikator'];
                                                        $sqlcekid = $koneksi->query("SELECT COUNT(*) as countid FROM tbl_pertanyaan WHERE id_indikator = '$idind' ORDER BY id_pertanyaan ASC");
                                                        $dataid = $sqlcekid->fetch_array();

                                                        $sqlsumid = $koneksi->query("SELECT SUM(nilai_angka) as nsum FROM tbl_jawaban WHERE id_indikator = '$idind' ORDER BY id_pertanyaan ASC");
                                                        $datasum = $sqlsumid->fetch_array();
                                                    ?>
                                                        <td colspan="<?= $dataid['countid']; ?>" class="text-center"><strong><?= $datasum['nsum']; ?></strong></td>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                                </tbody>
                                        </table>
                                    </div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <!-- <td colspan="9"><div align="right">
										<button type="submit" name="proses" class="btn btn-primary" disabled>Data Sudah DiProses</button></div></td>  -->

                                        <td colspan="8">
                                            <div align="right">
                                                <?php
                                                $sqlcek = mysqli_query($koneksi, "SELECT * FROM tbl_gap");
                                                $row = mysqli_num_rows($sqlcek);
                                                if ($row > 0) {
                                                ?>
                                                    <button type="submit" name="reproses" class="btn btn-success"><i class="fa fa-recycle"></i> Reset dan Proses kembali</button>
                                                    <a href="laporan_kuisioner.php" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Cetak </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <button type="submit" name="proses" class="btn btn-primary mr-2"><i class="fa fa-tasks"></i> Proses</button>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Tampil Data -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Modal  -->
    <!-- FOOTER START -->
    <?php
    include 'foot.php';
    ?>
    <!-- FOOTER END-->
    </div>
    <!-- END CONTAINER -->

    <?php
    include '../koneksi.php';

    if (isset($_POST['proses'])) {
        //proses Cobit
        //cek data responden
        $sqlcekres = $koneksi->query("SELECT * FROM tbl_responden");
        $rowres = $sqlcekres->num_rows;
        $totresp = $rowres;
        //1. Memanggil indikator
        $sql = $koneksi->query("SELECT * FROM tbl_indikator order by id_indikator ASC ");
        while ($row = $sql->fetch_array()) {
            $nilai_angka = 0;
            $totpertres = 0;
            $totindex = 0;
            $totpertanyaan = 0;
            $total_angka = 0;
            $id_indikator = $row['id_indikator'];
            // echo "<script>alert('indikator $row[id_indikator]')</script>";
            $sql4 = $koneksi->query("SELECT * FROM tbl_pertanyaan WHERE id_indikator = '$id_indikator'");
            $row4 = $sql4->num_rows;
            $totpertanyaan = $row4;
            $sql2 = $koneksi->query("SELECT * FROM tbl_pertanyaan WHERE id_indikator = '$id_indikator'");
            while ($row2 = $sql2->fetch_array()) {
                $id_pertanyaan = $row2['id_pertanyaan'];
                // echo "<script>alert('pertanyaan $row2[kode_indikator]')</script>";
                $sql3 = $koneksi->query("SELECT SUM(nilai_angka) as n_angka FROM tbl_jawaban WHERE id_pertanyaan = '$id_pertanyaan'");
                $row3 = $sql3->fetch_array();
                // echo "<script>alert('pertanyaan $row3[n_angka]')</script>";
                $nilai_angka = $row3['n_angka'];
                $total_angka += $nilai_angka;
            }
            // echo "<script>alert('total nilai $total_angka')</script>";
            $totpertres = $totresp * $totpertanyaan;
            $totindex = $total_angka / $totpertres;


            //koding simpan INDEX
            $simpanindex = $koneksi->query("INSERT INTO tbl_index VALUES ('','$id_indikator',
						'$totpertres','$total_angka','$totindex')");
            // echo "<script>alert('indikator = $id_indikator . index = $totindex')</script>";
            // PROSES GAP
            $n_harap = 5;
            $gap = $n_harap - $totindex;


            //KODING SIMPAN GAP
            $simpangap = $koneksi->query("INSERT INTO tbl_gap VALUES ('','$id_indikator',
						'$totindex','$n_harap','$gap')");
            echo "<script>alert('indikator = $id_indikator . GAP = $gap')</script>";
        }
        if (($simpanindex) && ($simpangap)) {
            echo "<script language=javascript>
                        window.alert('Proses Berhasil Dilakukan!');
                        window.location='gap.php';
                        </script>";
        } else {
            echo "<script language=javascript>
                window.alert('Proses Gagal  !');
                window.location='proses_index.php';
                </script>";
        }
    }
    if (isset($_POST['reproses'])) {
        $sqlDelete1 = $koneksi->query("TRUNCATE tbl_index");
        $sqlDelete2 = $koneksi->query("TRUNCATE tbl_gap");
        if ($sqlDelete1 && $sqlDelete2) {
            //proses Cobit
            //cek data responden
            $sqlcekres = $koneksi->query("SELECT * FROM tbl_responden");
            $rowres = $sqlcekres->num_rows;
            $totresp = $rowres;
            //1. Memanggil indikator
            $sql = $koneksi->query("SELECT * FROM tbl_indikator order by id_indikator ASC ");
            while ($row = $sql->fetch_array()) {
                $nilai_angka = 0;
                $totpertres = 0;
                $totindex = 0;
                $totpertanyaan = 0;
                $total_angka = 0;
                $id_indikator = $row['id_indikator'];
                echo "<script>alert('indikator $row[id_indikator]')</script>";
                $sql4 = $koneksi->query("SELECT * FROM tbl_pertanyaan WHERE id_indikator = '$id_indikator'");
                $row4 = $sql4->num_rows;
                $totpertanyaan = $row4;
                $sql2 = $koneksi->query("SELECT * FROM tbl_pertanyaan WHERE id_indikator = '$id_indikator'");
                while ($row2 = $sql2->fetch_array()) {
                    $id_pertanyaan = $row2['id_pertanyaan'];
                    // echo "<script>alert('pertanyaan $row2[kode_indikator]')</script>";
                    $sql3 = $koneksi->query("SELECT SUM(nilai_angka) as n_angka FROM tbl_jawaban WHERE id_pertanyaan = '$id_pertanyaan'");
                    $row3 = $sql3->fetch_array();
                    // echo "<script>alert('pertanyaan $row3[n_angka]')</script>";
                    $nilai_angka = $row3['n_angka'];
                    $total_angka += $nilai_angka;
                }
                echo "<script>alert('total nilai $total_angka')</script>";
                $totpertres = $totresp * $totpertanyaan;
                $totindex = $total_angka / $totpertres;


                //koding simpan INDEX
                $simpanindex = $koneksi->query("INSERT INTO tbl_index VALUES ('','$id_indikator',
						'$totpertres','$total_angka','$totindex')");
                echo "<script>alert('indikator = $id_indikator . index = $totindex')</script>";
                // PROSES GAP
                $n_harap = 5;
                $gap = $n_harap - $totindex;


                //KODING SIMPAN GAP
                $simpangap = $koneksi->query("INSERT INTO tbl_gap VALUES ('','$id_indikator',
						'$totindex','$n_harap','$gap')");
                echo "<script>alert('indikator = $id_indikator . GAP = $gap')</script>";
            }
            if (($simpanindex) && ($simpangap)) {
                echo "<script language=javascript>
                        window.alert('Proses Berhasil Dilakukan!');
                        window.location='gap.php';
                        </script>";
            } else {
                echo "<script language=javascript>
                window.alert('Proses Gagal  !');
                window.location='proses_index.php';
                </script>";
            }
        } else {
            echo "<script language=javascript>
            window.alert('Proses Gagal  !');
            window.location='proses_index.php';
            </script>";
        }
    }
    ?>

</body>

</html>
<?php include 'footer.php'; ?>