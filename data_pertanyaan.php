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
                        <h3 class="mt-1">Pertanyaan - <?= $_SESSION['level']; ?></h3>
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Pertanyaan</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_kriteria"><i class="fa fa-plus fa-sm"></i> Tambah Pertanyaan</button>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <!-- <th>ID Indikator</th> -->
                                            <th>Indikator</th>
                                            <th>Pertanyaan</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../koneksi.php';
                                        $no = 1;
                                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_pertanyaan a JOIN tbl_indikator b ON a.id_indikator = b.id_indikator");
                                        $arr = array();
                                        while ($rowdata = $sql->fetch_object()) {
                                            $arr[$rowdata->id_indikator][] = $rowdata;
                                        }
                                        $no = 1;
                                        foreach ($arr as $key => $val) :
                                            foreach ($val as $k => $v) :
                                        ?>
                                                <tr>
                                                    <?php if ($k == 0) : ?>
                                                        <td rowspan="<?= count($val); ?>">
                                                            <?= $no++; ?>
                                                        </td>
                                                        <td rowspan="<?= count($val); ?>">
                                                            <b><?= $v->nama_indikator . " (" . $v->kode_indikator ?>)</b>
                                                        </td>
                                                    <?php endif ?>
                                                    <td><?= $v->pertanyaan ?></td>
                                                    <center>
                                                        <td>
                                                            <a href="edit_pertanyaan.php?id=<?= $v->id_pertanyaan ?>"><i class="btn btn-success btn-sm"><span class="fa fa-edit"></span></i></a>
                                                        </td>
                                                        <td>
                                                            <a href="hapus_pertanyaan.php?id=<?= $v->id_pertanyaan ?>"><i class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></i></a>
                                                        </td>
                                                    </center>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endforeach ?>
                                    </tbody>
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
                            <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Pertanyaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $_SESSION['id']; ?>">
                                    <label>Kode Indikator</label>
                                    <select name="kode" class="form-control">
                                        <option value="#">Pilih Indikator</option>
                                        <?php
                                        $sqlindikator = $koneksi->query("SELECT * FROM tbl_indikator");
                                        while ($arrayindikator = $sqlindikator->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $arrayindikator['id_indikator'] ?>"><?php echo $arrayindikator['kode_indikator'] . "-" . $arrayindikator['nama_indikator']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <label>Pertanyaan</label>
                                    <textarea name="pertanyaan" id="" cols="30" rows="10" class="form-control"></textarea>
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
        $query2 = mysqli_query($koneksi, "SELECT * FROM tbl_pertanyaan ORDER BY id_pertanyaan DESC");
        $data2 = mysqli_fetch_assoc($query2);


        $kode    = $_POST['kode'];
        $pertanyaan  = $_POST['pertanyaan'];


        $save = mysqli_query($koneksi, "INSERT INTO tbl_pertanyaan VALUES('','$kode','$pertanyaan')");

        if ($save) {
            echo "<script language=javascript>
                window.alert('Berhasil Menambah!');
                window.location='data_pertanyaan.php';
                </script>";
        } else {
            echo "<script language=javascript>
                window.alert('Gagal Menambah!');
                window.location='data_pertanyaan.php';
                </script>";
        }
    }
    ?>

</body>

</html>
<?php include 'footer.php'; ?>