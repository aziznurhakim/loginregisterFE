<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Input Peminjaman</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/cardcss.css">
  <style>
    table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  text-align: center;
  border-radius: 12px 12px 0 0;
  overflow: hidden;
  box-shadow: 0 2px 12px rgba(32,32,32,.3);
  background: #fafafa;
}
th,td{
  padding: 10px 15px;
}
th{
  background: linear-gradient(to right bottom, #65dfc9, #6cdbeb);
}
  </style>
</head>
<body>
<?php 
	session_start();
  $koneksi = mysqli_connect('localhost','root','','perpusku');
 
if (mysqli_connect_errno()){
  echo "Koneksi database gagal : " . mysqli_connect_error();
}
$result = mysqli_query($koneksi ,"SELECT * FROM peminjaman");
  if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
  } 
	?>

<div class="wrapper">
    <div class="sidebar">
        <h2>Perpus Ku</h2>
        <ul>
			
            <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Siswa</a></li>
            <li><a href="peminjaman.php"><i class="fas fa-address-card"></i>Pinjaman</a></li>
            <li><a href="logout.php"><i class="fas fa-map-pin"></i>Logout</a></li>
        </ul> 
        <div class="social_media">
          <a href="https://www.hentaivideo.tube/"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com/azisshkim"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
</head>
<body>
	<div class="form">
		<div class="container">
	<h1>Tambah Peminjaman</h1>
	<form action="form_add_aksi.php" method="POST">
		<table>
			<tr>
			<td>ID Buku</td>
			<td>:</td>
			<td><input type="text" name="id_buku"></td>
			</tr>
			<tr>
			<td>Nama Siswa</td>
			<td>:</td>
			<td><input type="text" name="nama_siswa"></td>
			</tr>
			<tr>
			<td>Tgl Pinjam</td>
			<td>:</td>
			<td><input type="date" name="Tgl_Pinjam"></td>
			</tr>
			<tr>
			<td>Tgl Kembali</td>
			<td>:</td>
			<td><input type="date" name="Tgl_Kembali"></td>
			</tr>
			<tr>
			<td>Terlambat</td>
			<td>:</td>
			<td><input type="text" name="terlambat"></td>
			</tr>
			<tr>
			<td>Status</td>
			<td>:</td>
			<td><input type="checkbox" name="status"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="kirim">Kirim</button>
					<button type="reset" name="reset">Batal</button>
				</td>
			</tr>
			<th>No</th>

    <th>ID Buku</th>
    <th>Nama Siswa</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Terlambat</th>
    <th>Status</th>
    </tr>
    <?php foreach($result as $row):?>
    <tr>
    <td><?= $row["id"]; ?></td>
    <td><?= $row["id_buku"]; ?></td>
    <td><?= $row["nama_siswa"]; ?></td>
    <td><?= $row["Tgl_Pinjam"]; ?></td>
    <td><?= $row["Tgl_Kembali"]; ?></td>
    <td><?= $row["terlambat"]; ?></td>
    <td><?= $row["status"]; ?></td>
    <td>
    <a href=$delete>ubah</a> |
    <a href="">hapus</a>
    </tr>
    <?php endforeach?>
		</table>
		</div>
	</form>
	</div>
</body>
</html>