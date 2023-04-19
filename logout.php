<?php
session_start();
unset($_SESSION['idr']);
session_destroy();

echo "
		<script>
			alert('Anda Telah Logut');
			document.location.href='../index.php';
		</script>
		";
exit;
