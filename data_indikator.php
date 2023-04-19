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

            <!-- page title area end -->

            <div class="main-content-inner">

                <div class="sales-report-area mt-1 mb-5">
                    <!-- Basic Card Example -->

                    <!-- Tampil Data  -->
                    <div class="card shadow mt-3 mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Indikator</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_kriteria"><i class="fa fa-plus fa-sm"></i> Tambah Indikator</button>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <!-- <th>ID Indikator</th> -->
                                            <th>Kode Indikator</th>
                                            <th>Nama Indikator</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_indikator");
                                    while ($array = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <!-- <td><?php echo $array['id_indikator']; ?></td> -->
                                                <td><?php echo $array['kode_indikator']; ?></td>
                                                <td><?php echo $array['nama_indikator']; ?></td>
                                                <td>
                                                    <a href="edit_indikator.php?id=<?php echo $array['id_indikator']; ?>"><i class="btn btn-success btn-sm"><span class="fa fa-edit"></span></i></a>
                                                </td>
                                                <td>
                                                    <a href="hapus_indikator.php?id=<?php echo $array['id_indikator']; ?>"><i class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tampil Data -->
            <!-- Modal -->
            <div class="modal fade" id="tambah_kriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Indikator</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $_SESSION['id']; ?>">
                                    <label>Kode Indikator</label>
                                    <input type="text" class="form-control mb-2" name="kode" placeholder="Kode Indikator" required="">

                                    <label>Nama Indikator</label>
                                    <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Indikator">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambah" class="btn btn-primary btn-sm">Tambah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <!-- FOOTER START -->
        <?php
        include 'foot.php';
        ?>
        <!-- FOOTER END-->
    </div>
    <!-- END CONTAINER -->

    <?php
    include '../koneksi.php';
    if (isset($_POST['tambah'])) {
        $query2 = mysqli_query($koneksi, "SELECT * FROM tbl_indikator ORDER BY id_indikator DESC");
        $data2 = mysqli_fetch_assoc($query2);
        $jml = mysqli_num_rows($query2);
        if ($jml == 0) {
            $idk = 'K-i01';
        } else {
            $subid = substr($data2['id_indikator'], 4);
            if ($subid > 0 && $subid <= 8) {
                $sub = $subid + 1;
                $idk = 'K-i0' . $sub;
            } elseif ($subid >= 9 && $subid <= 100) {
                $sub = $subid + 1;
                $idk = 'K-i' . $sub;
            } elseif ($subid >= 99 && $subid <= 1000) {
                $sub = $subid + 1;
                $idk = 'K-' . $sub;
            }
        }

        $kode    = $_POST['kode'];
        $nama  = $_POST['nama'];


        $save = mysqli_query($koneksi, "INSERT INTO tbl_indikator VALUES('$idk','$kode','$nama')");

        if ($save) {
            echo "<script language=javascript>
                window.alert('Berhasil Menambah!');
                window.location='data_indikator.php';
                </script>";
        } else {
            echo "<script language=javascript>
                window.alert('Gagal Menambah!');
                window.location='data_indikator.php';
                </script>";
        }
    }
    ?>

</body>

</html>
<?php include 'footer.php'; ?>