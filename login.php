<?php
include 'koneksi.php';
session_start();
// if (isset($_POST["loginn"])) {

//     $username = $_POST["username"];
//     $password = $_POST["password"];
//     // $password = $_POST["password"];

//     // // $result = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username' AND password ='$password'");

//     // // $rm = mysqli_fetch_assoc($result);
//     // // $row = mysqli_num_rows($result);
//     // if ($row >0){

//     // $data = mysqli_fetch_assoc($result);
//     // Cek login dengan admin
//     if ($data['level'] == "Admin") {

//         // Session login dan username
//         $_SESSION['id']         = $data['id'];
//         $_SESSION['username']   = $username;
//         $_SESSION['level']      = "admin";
//         // Ke halaman admin index
//         header("location:admin/index.php");

//         // Cek jika user login sebagai pimpinan
//     } else if ($data['level'] == "Responden") {
//         // Session login dan username
//         $_SESSION['id']         = $data['id'];
//         $_SESSION['username']   = $username;
//         $_SESSION['level']      = "responden";
//         // Ke halaman admin index
//         header("location:responden/index.php");
//     } else {
//         echo "<script>
// 				alert('Username / Password Salah !');
// 				document.location.href='login.php';
// 			</script>";
//     }
// }


// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Cobit 4.1</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-form-login.css">

</head>

<body>
    <?php include 'header.php'; ?>
    <?php if (isset($error)) : ?>
        echo "
        <script>
            document.location.href = '/index.php';
        </script>
        ";
    <?php endif; ?>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="post">
                    <div class="login-form-head bg-primary">
                        <img src="./assets/images/icon.png" width="70px" alt="">
                        <h4>User Login</h4>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="username">Username</label>
                            <input type="text" name="username" required>
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" name="password" required>
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="password">Level</label>
                            <br>
                            <select class="custom-select mr-sm-2" name="level" required>
                                <option selected>Pilih User</option>
                                <option value="Pimpinan">Pimpinan</option>
                                <option value="Admin">Admin</option>
                                <option value="Responden">Responden</option>
                            </select>
                        </div>

                        <div class="submit-btn-area">
                            <button type="submit" name="login">Login <i class="ti-arrow-right"></i></button>

                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Daftar Responden<a href="register.php">Daftar</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->


</body>

</html>
<?php include 'footer.php'; ?>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level    = $_POST['level'];

    if ($level == "Admin") {
        $result = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username' AND password ='$password' AND level = 'Admin'");
        $rm = mysqli_fetch_assoc($result);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            // Session login dan username
            $_SESSION['id']         = $data['id'];
            $_SESSION['username']   = $username;
            $_SESSION['level']      = "Admin";
            // Ke halaman admin index

            echo "<script>
				alert('Selamat Datang Admin');
				document.location.href='admin/index.php';
			</script>";
        } else {
            echo "<script>
				alert('Username atau Password anda salah!');
				document.location.href='login.php';
			</script>";
        }
    } elseif ($level == "Pimpinan") {
        $result = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username' AND password ='$password' AND level = 'Pimpinan'");
        $rm = mysqli_fetch_assoc($result);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            // Session login dan username
            $_SESSION['id']         = $data['id'];
            $_SESSION['username']   = $username;
            $_SESSION['level']      = "Pimpinan";
            // Ke halaman admin index

            echo "<script>
				alert('Selamat Datang Pimpinan');
				document.location.href='admin/index.php';
			</script>";
        } else {
            echo "<script>
				alert('Username atau Password anda salah!');
				document.location.href='login.php';
			</script>";
        }
    } elseif ($level == "Responden") {
        $result = mysqli_query($koneksi, "SELECT * FROM tbl_responden WHERE username = '$username' AND password ='$password'");
        $rm = mysqli_fetch_assoc($result);
        $row = mysqli_num_rows($result);
        // Session login dan username
        if ($row > 0) {
            $_SESSION['idr']         = $rm['id_responden'];
            $_SESSION['username']   = $username;
            $_SESSION['nama']       = $rm['nama'];
            $_SESSION['level']      = "Responden";
            // Ke halaman admin index
            // header("location:responden/index.php");
            echo "<script>
                    alert('Selamat Datang Responden');
                    document.location.href='responden/index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Login Gagal!');
                    document.location.href='login.php';
                </script>";
        }
    }
}
?>