<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'login_uas';
$conn = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
	echo "Gagal koneksi ke mysql".mysqli_connect_error();
}
?>