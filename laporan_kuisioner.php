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
    <title>Lap. Kuisioner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

    <?php include 'header.php'; ?>
    <div class="main-content-inner">

        <div class="sales-report-area mt-5 mb-5">
            <!-- Basic Card Example -->

            <!-- Tampil Data  -->
            <h3 class="text-center">JNE CABANG MUARO BODI</h3>
            <p class="text-center"> Alamat: Jl. Lintas Sumatera, Muaro Bodi, IV Nagari, Kabupaten Sijunjung, Sumatera Barat 27564.</p>
            <br>
            <h4 class="m-0 font-weight-bold text-dark text-center mt-2">Laporan Hasil Kuisioner</h4>
            <hr style="border: 1px solid black;">
            <br>
            <div class="table-responsive">
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
        </div>

    </div>

    </div>
    <h5 style="margin-left: 70%; margin-bottom: 5%;">Kab. Sijunjung, <?php echo date('d F Y') ?></h5>
    <br>
    <h5 style="margin-left: 70%; margin-bottom: 1%;">JNE Cabang Muaro Bodi</h3>
        <h5 style="margin-left: 72%; margin-top: 1%;">SUMATERA BARAT</h3>

            </div>
            <br>
            <br>

            <!-- End Tampil Data -->

            <!-- FOOTER START -->
            <!-- FOOTER END-->
            </div>
            <!-- END CONTAINER -->
<script>
    window.print();
</script>

</body>

</html>
<?php include 'footer.php'; ?>