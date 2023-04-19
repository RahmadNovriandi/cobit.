<?php
include '../koneksi.php';
$idk= $_GET['id'];

$delete = mysqli_query($koneksi,"DELETE FROM tbl_pertanyaan WHERE id_pertanyaan = '$idk'");
if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus Data!');
	window.location='data_pertanyaan.php';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='data_pertanyaan.php';
	</script>";
}

?>