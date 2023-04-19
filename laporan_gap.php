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
    <title>Lap. GAP</title>
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
            <h4 class="m-0 font-weight-bold text-dark text-center mt-2">Hasil GAP</h4>
            <hr style="border: 1px solid black;">
            <br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-info">
                        <tr align="center">
                            <th>No</th>
                            <th>Kode Indikator</th>
                            <th>Nilai Index</th>
                            <th>Nilai Diharapkan</th>
                            <th>Nilai GAP</th>

                        </tr>
                    </thead>
                    <?php
                    $pbg = 0;
                    $g = 0;
                    include '../koneksi.php';
                    $no = 1;
                    // SQL data Indikator
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_gap a JOIN tbl_indikator b ON a.id_indikator = b.id_indikator order by a.id_gap ASC ");
                    while ($array = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tbody>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td class="text-center"><?php echo $array['kode_indikator']; ?></td>
                                <td class="text-center"><?php echo $array['index_sekarang']; ?></td>
                                <td class="text-center"><?php echo $array['diharapkan']; ?></td>
                                <td class="text-center"><?php echo $array['gap']; ?></td>
                            </tr>
                        </tbody>
                    <?php
                        $pbg += 1;
                        $g += $array['gap'];
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