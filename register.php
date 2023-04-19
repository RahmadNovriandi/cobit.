<?php include 'koneksi.php'; ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cobit 4.1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <?php include 'header.php'; ?>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="post">
                    <div class="login-form-head">
                        <h4>JNE Cabang Muaro Bodi</h4>
                        <p>Cobit 4.1</p>
                        <p class="mt-2"><b>Pendaftaran Responden</b></p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="username">Username</label>
                            <input type="text" name="username">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="passsword">Password</label>
                            <input type="text" name="password">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-group">
                            <label for="jenis kelamin">Jenis Kelamin</label>
                            <select name="jenis_kel" class="form-control">
                                <option value="">----</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>

                            </select>

                        </div>
                        <div class="submit-btn-area">
                            <button type="submit" name="daftar">Daftar <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include 'koneksi.php';
    if (isset($_POST['daftar'])) {
        $query2 = mysqli_query($koneksi, "SELECT * FROM tbl_responden ORDER BY id_responden DESC");
        $data2 = mysqli_fetch_assoc($query2);


        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $nama           = $_POST['nama'];
        $jenis_kel      = $_POST['jenis_kel'];


        $save = mysqli_query($koneksi, "INSERT INTO tbl_responden VALUES('$idk','$username','$password','$nama','$jenis_kel')");

        if ($save) {
            echo "<script language=javascript>
            window.alert('Berhasil Daftar!');
            window.location='login.php';
            </script>";
        } else {
            echo "<script language=javascript>
            window.alert('Gagal Daftar!');
            window.location='register.php';
            </script>";
        }
    }
    ?>

    ?>
</body>

</html>
<?php include 'footer.php'; ?>