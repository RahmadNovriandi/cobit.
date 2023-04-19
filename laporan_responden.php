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
    <title>Lap. Responden</title>
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
            <hr style="border: 1px solid black;">
            <h4 class="m-0 font-weight-bold text-dark text-center mt-2">Data Responden</h4>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-info">
                        <tr align="center">
                            <th>No</th>
                            <th>Nama </th>
                            <th>Username </th>
                            <th>Password</th>
                            <th>Jenis Kelamin</th>


                        </tr>
                    </thead>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_responden");
                    while ($array = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $array['nama']; ?></td>
                                <td><?php echo $array['username']; ?></td>
                                <td><?php echo $array['password']; ?></td>
                                <td><?php echo $array['jenis_kelamin']; ?></td>

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
    <h5 style="margin-left: 70%; margin-bottom: 5%;">Kab. Sijunjung, <?php echo date('d F Y') ?></h5>
    <br>
    <h5 style="margin-left: 70%; margin-bottom: 1%;">JNE Cabang Muaro Bodi</h3>
        <h5 style="margin-left: 72%; margin-top: 1%;">SUMATERA BARAT</h3>
            </div>
            <br>
            <br>

            <!-- End Tampil Data -->

            <!-- FOOTER START -->
            <footer>
                <div class="footer-area">
                    <p>© Copyright 2022 .  <a href="https://colorlib.com/wp/">Rahmad Novriandi</a>.</p>
                </div>
            </footer>
            <!-- FOOTER END-->
            </div>
            <!-- END CONTAINER -->
<script>
    window.print();
</script>

</body>

</html>
<?php include 'footer.php'; ?>