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
                        <!-- <img src="../assets/images/bapenda.png" alt="Bapenda Kota Padang" width="500px;"> -->
                        <div class="card">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ANALISA KUALITAS SISTEM INFORMASI MANAJEMEN KEPUASAN PELANGGAN DALAM PENGIRIMAN BARANG DI JNE KABUPATEN SIJUNJUNG DENGAN METODE COBIT MENGGUNAKAN BAHASA PEMROGRAMAN PHP DAN DATABASE MYSQL</h5>
                            <p class="card-text"></p>

                        </div>
                    </div>

                    <!-- End Card -->

                    <div class="sales-report-area mt-5 mb-5">


                        <div class="row">
                        </div>
                        <h4 class="text-center ">Selamat Datang <b><?php echo $_SESSION['nama']; ?></b></h4>
                        <?php
                        // var_dump($_SESSION['nama']);
                        ?>
                        <br><br>
                        <div class="card">
                            <div class="card-header">
                                Kriteria Penilaian
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Range Penilaian</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kriteria</th>
                                                <th>Keterangan</th>
                                                <th>Skor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-success">
                                                <td>1</td>
                                                <td>SB</td>
                                                <td>Sangat Baik</td>
                                                <td>5</td>
                                            </tr>
                                            <tr class="bg-info">
                                                <td>2</td>
                                                <td>B</td>
                                                <td>Baik</td>
                                                <td>4</td>
                                            </tr>
                                            <tr class="bg-warning">
                                                <td>3</td>
                                                <td>BS</td>
                                                <td>Biasa Saja</td>
                                                <td>3</td>
                                            </tr>
                                            <tr class="bg-danger">
                                                <td>4</td>
                                                <td>TB</td>
                                                <td>Tidak Baik</td>
                                                <td>2</td>
                                            </tr>
                                            <tr class="bg-secondary">
                                                <td>5</td>
                                                <td>STB</td>
                                                <td>Sangat Tidak Baik</td>
                                                <td>1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <h4 class="mt-4 ml-2">Isi kuisioner</h4>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th class="col-6">Pertanyaan</th>
                                            <th colspan="2">Pilih Kondisi</th>
                                        </tr>
                                    </thead>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <?php
                                        include '../koneksi.php';
                                        $no = 1;
                                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_pertanyaan ORDER BY id_pertanyaan ASC");
                                        while ($array = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td class="col-5"><?php echo $array['pertanyaan']; ?></td>
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="custom-select mr-sm-2" name="jawaban[]">
                                                                <option selected>PILIH NILAI</option>
                                                                <option value="1/<?= $array['id_pertanyaan']; ?>">Sangat Tidak Baik</option>
                                                                <option value="2/<?= $array['id_pertanyaan']; ?>">Tidak Baik</option>
                                                                <option value="3/<?= $array['id_pertanyaan']; ?>">Biasa Saja</option>
                                                                <option value="4/<?= $array['id_pertanyaan']; ?>">Baik</option>
                                                                <option value="5/<?= $array['id_pertanyaan']; ?>">Sangat Baik</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php
                                        }
                                        ?>
                                </table>
                            </div>
                            <div class="pull-right">
                                <?php
                                $querybutton = mysqli_query($koneksi, "SELECT * FROM tbl_jawaban WHERE id_responden = '$_SESSION[idr]'");
                                $pecah = mysqli_num_rows($querybutton);
                                if ($pecah > 0) {
                                ?>
                                    <button type="submit" name="simpan" class="btn btn-success" disabled>SUDAH MELAKUKAN KUISIOER</button>
                                <?php
                                } else {
                                ?>
                                    <button type="submit" name="simpan" class="btn btn-success">SIMPAN KUISIONER</button>
                                <?php
                                }
                                ?>
                            </div>
                            </form>
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
    <?php
    include '../koneksi.php';
    if (isset($_POST['simpan'])) {

        //id responden
        $id = $_SESSION['idr'];
        foreach ($_POST['jawaban'] as $value) {
            $arr = (explode("/", $value, 2));

            //id pertanyaan
            $idp = $arr[1];
            //cek kode indikator berdasarkan id pertanyaan
            $sqlcek = $koneksi->query("SELECT id_indikator FROM tbl_pertanyaan WHERE id_pertanyaan = '$idp'");
            $rowcek = $sqlcek->fetch_array();
            $kode_indikator = $rowcek[0];


            //nilai jawaban
            $nj = $arr[0];
            if ($nj == "5") {
                $huruf = "Sangat Baik";
            } elseif ($nj == "4") {
                $huruf = "Baik";
            } elseif ($nj == "3") {
                $huruf = "Biasa Saja";
            } elseif ($nj == "2") {
                $huruf = "Tidak Baik";
            } elseif ($nj == "1") {
                $huruf = "Sangat Tidak Baik";
            }
            echo "ID User = $id <br>";
            echo "ID Pertanyaan = $idp <br>";
            echo "KODE Indikator = $kode_indikator <br>";
            echo "N Huruf = $huruf <br>";
            echo "Jawaban = $nj <br>";

            //KODING SIMPAN
            $simpankusioner = mysqli_query($koneksi, "INSERT INTO tbl_jawaban VALUES('','$id','$idp','$kode_indikator','$huruf','$nj')");

            if ($simpankusioner) {
                echo "<script language=javascript>
                        window.alert('Kuisioner Telah Di isi ');
                        window.location='kuisioner.php';
                        </script>";
            } else {
                echo "<script language=javascript>
                        window.alert('Gagal Menambah Data!');
                        window.location='kuisioner.php';
                        </script>";
            }
        }

        // $query2 = mysqli_query($koneksi,"SELECT * FROM tbl_jawaban ORDER BY id_kuisioner DESC");
        // $data2 = mysqli_fetch_assoc($query2);


        //     // $kode    = $_POST['kode'];
        //     $jawaban  = $_POST['jawaban'];


        // $save = mysqli_query($koneksi,"INSERT INTO tbl_jawaban VALUES('','$jawaban')");

    }
    ?>

</body>

</html>
<?php include 'footer.php'; ?>