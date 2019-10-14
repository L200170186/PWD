<html>
<head>
	<title>Data Gudang</title>
</head>
<body>
	<center>
		<?php
			error_reporting(E_ALL ^ E_NOTICE);

			$conn = mysqli_connect("localhost","root","","stok");

			$KODELAMA = $_POST["KODELAMA"];
			$KODE = $_POST["KODE"];
			$Nama = $_POST["Nama"];
			$Lokasi = $_POST["Lokasi"];

			$Submit = $_POST["Submit"];
			$Ubah = $_POST["Ubah"];

			if ($Submit) {
				if ($KODE == "") {
					echo "<h3>Kode Gudang tidak boleh kosong</h3>";
				} elseif ($Nama == "") {
					echo "<h3>Nama Gudang tidak boleh kosong</h3>";
				} elseif ($Lokasi == "") {
					echo "<h3>Lokasi tidak boleh kosong</h3>";
				} else {
					$insert = "INSERT INTO gudang (kode_gudang, nama_gudang, lokasi) 
								VALUES ('$KODE','$Nama','$Lokasi')
							";
					mysqli_query($conn, $insert); 
					echo "<h3>Data Berhasil Dimasukkan</h3>";
				}
			
			} elseif ($Ubah) {
				if ($KODE == "") {
					echo "<h3>Kode Gudang tidak boleh kosong</h3>";
				} elseif ($Nama == "") {
					echo "<h3>Nama Gudang tidak boleh kosong</h3>";
				} elseif ($Lokasi == "") {
					echo "<h3>Lokasi tidak boleh kosong</h3>";
				} else {
					$update = " UPDATE gudang
								SET kode_gudang='$KODE', nama_gudang='$Nama', lokasi='$Lokasi'
								WHERE kode_gudang = '$KODELAMA'
							";
					mysqli_query($conn, $update); 
					echo "<h3>Data Berhasil Diubah</h3>";
				}
			}
			
			if ($_GET["hps"]) {
				$KODE = $_GET["hps"]; 
				$hapus = "DELETE FROM gudang WHERE kode_gudang = '$KODE'";
				mysqli_query($conn, $hapus);
				echo "<h3>Data berhasil di hapus</h3>";
			
			} elseif ($_GET["ubh"]) {
				$KODE= $_GET["ubh"]; 
				$cari = "SELECT * FROM gudang WHERE kode_gudang='$KODE'";
				$hasil = mysqli_query($conn, $cari);
				$dataGudang = mysqli_fetch_row($hasil); 
			}
		?>

	
		<form method="post" action="tugas2.php">
			<table>
				<tr>
					<td>Kode Gudang</td>
					<td>:</td>
					<td> 
						<input type="text" name="KODE" value="<?php echo $dataGudang[0] ?>">
						<input type="hidden" name="KODELAMA" value="<?php echo $dataGudang[0] ?>">
					</td>
				</tr>
				<tr>
					<td>Nama Gudang</td>
					<td>:</td>
					<td>
						<input type="text" name="Nama" value="<?php echo $dataGudang[1] ?>">
					</td>
				</tr>
				<tr>
					<td>Lokasi</td>
					<td>:</td>
					<td>
						<input type="text" name="Lokasi" value="<?php echo $dataGudang[2] ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<?php
							if ($dataGudang) {
								echo "<input type='submit' name='Ubah' value='Ubah'>";
							} else {
								echo "<input type='submit' name='Submit' value='Submit'>";
							}
						?>
					</td>
				</tr>
			</table>
		</form>

		<hr>

		<table border="1">
			<tr>
				<td>Kode Gudang</td>
				<td>Nama Gudang</td>
				<td>Lokasi</td>
				<td>Aksi</td>
			</tr>
			<?php
				$cari = "SELECT * FROM gudang";
				$hasil = mysqli_query($conn, $cari);
				while ($data = mysqli_fetch_row($hasil)){
					echo "
						<tr>
							<td>$data[0]</td>
							<td>$data[1]</td>
							<td>$data[2]</td>
							<td>
								<a href='tugas2.php?ubh=$data[0]'>Ubah</a>
								<a href='tugas2.php?hps=$data[0]'>Hapus</a>
							</td>
						</tr>
					";
				}
			?>
		</table>

	</center>
</body>
</html>