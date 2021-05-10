<?php
include "koneksi.php";

if(isset($_POST['kirim'])){
	$id_buku	= $_POST['id_buku'];
	$nama_siswa	= $_POST['nama_siswa'];
	$Tgl_Pinjam	= $_POST['Tgl_Pinjam'];
	$Tgl_Kembali= $_POST['Tgl_Kembali'];
	$terlambat	= $_POST['terlambat'];
	$status		= $_POST['status'];

	$simpan = "INSERT INTO peminjaman(id_buku,nama_siswa,Tgl_Pinjam,Tgl_Kembali,terlambat,status)
	VALUES('$id_buku','$nama_siswa','$Tgl_Pinjam','$Tgl_Kembali','$terlambat','$status')"

	$result = mysqli_query($koneksi,$simpan)
	if ($result) {
		echo "<script>alert('Data Berhasil Disimpan');window.location='tambahpinjaman.php'";
	}
} 

?>