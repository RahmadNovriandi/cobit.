<?php
include '../koneksi.php';
$idk = $_GET['id'];

$delete = mysqli_query($koneksi, "DELETE FROM tbl_responden WHERE id_responden = '$idk'");
if ($delete) {
    echo "<script language=javascript>
	window.alert('Berhasil Menghapus Data!');
	window.location='data_responden.php';
	</script>";
} else {
    echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='data_responden.php';
	</script>";
}
