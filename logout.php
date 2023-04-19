<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

echo "
		<script>
			alert('Anda Telah Logut');
			document.location.href='../index.php';
		</script>
		";
	exit;

?>