<html>
<head><title>Tentukan Bilangan Ganjil/Genap</title></head>
<body>
<form method = "POST" action = "tugas2.php">
<p>Masukan Nilai Angka :<input type = "text" name = "nilai" size = "3"></p>
<p><input type = "submit" value = "proses" name = "submit"></p>
</form>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$nilai = $_POST["nilai"];
$submit = $_POST["submit"];
if ($submit) {
	if ($nilai % 2 == 1) {
		$kalimat = '"Bilangan Ganjil"';
	}else{
		$kalimat = '"Bilangan Genap"';
	}
echo " Nilai angka adalah $nilai</br>";
echo " Termasuk $kalimat";
}
?>
</body>
</html>