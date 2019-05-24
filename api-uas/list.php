<?php
	include("koneksi.php");
	$sql = "SELECT * FROM user";
	$results​ = mysqli_query($conn, $sql);
	if (!$results​) {
		echo "Error".mysqli_error($conn);
	}
	$dia = [];
	while ($row = mysqli_fetch_object($results​)) {
		$dia ['user'][] = $row;
	}

	if (isset ($_GET['coba'])) {
		echo "<pre>";
		echo json_encode($dia, JSON_PRETTY_PRINT);
		echo "</pre>";
	}else{
		echo json_encode($dia);
	}
?>