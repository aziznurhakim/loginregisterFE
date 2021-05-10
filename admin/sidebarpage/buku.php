
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perpus Ku</title>
	<link rel="stylesheet" href="../styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/cardcss.css">
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
.color-change {
  border-radius: 5px;
  font-size: 10px;
  padding: 14px 10px;
  cursor: pointer;
  color: black;
  margin-left: 110px;
  background: linear-gradient(to right bottom, #65dfc9, #6cdbeb);
  font-size: 0.8rem;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: 100;
  border: 1px solid #fff;
  box-shadow: 2px 2px 5px #AFE9FF;
  transition-duration: 0.5s;
  -webkit-transition-duration: 0.5s;
  -moz-transition-duration: 0.5s;
}

.color-change:hover {
  color: #006398;
  border: 1px solid #006398;
  box-shadow: 2px 2px 20px #AFE9FF;
}

button.color-change {
  -webkit-appearance: none;
  -moz-appearance: none;
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
  $resultBuku = mysqli_query($koneksi,"SELECT count(*) FROM buku");
  $delete = mysqli_query($koneksi,'DELETE FROM buku WHERE id = $row["id"]');
  $row = mysqli_fetch_array($resultBuku);

  
  $total = $row[0];

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
$result = mysqli_query($koneksi ,"SELECT * FROM buku");
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	};
	?>

<div class="wrapper">
    <div class="sidebar">
        <h2>Perpus Ku</h2>
        <ul>
			
            <li><a href="../index.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-book"></i>Buku</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Siswa</a></li>
            <li><a href="#"><i class="fas fa-address-card"></i>Pinjaman</a></li>
            <li><a href="#"><i class="fas fa-project-diagram"></i>Pengembalian</a></li>
            <li><a href="logout.php"><i class="fas fa-map-pin"></i>Logout</a></li>
        </ul> 
        <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <div class="main_content">


        <div class="header"><h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4></div>  
        <div class="info">
		<div class="row">
  <div class="column">
    <div class="card">
    <img style="float: left;" src="../sidebarpage/asset/agenda.png"/>
      <h3><?php echo $total; ?></h3>
      <p>Total Buku</p>
      <Button class="color-change" onclick="location.href='../sidebarpage/tambahBuku.php'" >Tambah Buku</Button>
    </div>
  </div>
   <table cellpadding="5" cellspacing="0">
    <tr>
    
    <th>No</th>

    <th>Judul Buku</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Jumlah Buku</th>
    <th>Jumlah Halaman</th>
    <th>Action</th>
    </tr>
    <?php foreach($result as $row):?>
    <tr>
    <td><?= $row["id"]; ?></td>
    <td><?= $row["judul_buku"]; ?></td>
    <td><?= $row["pengarang"]; ?></td>
    <td><?= $row["penerbit"]; ?></td>
    <td><?= $row["jumlah_buku"]; ?></td>
    <td><?= $row["jumlah_halaman"]; ?></td>
    <td>
    <a href="ubahBuku.php?id=<?=$row["id"];?>">ubah</a> |
    <a href="hapusBuku.php?id=<?=$row["id"];?>">hapus</a>
    </tr>
    <?php endforeach?>
    </table>
</div>
	
         
      </div>
    </div>


    
</div>


</body>
</html>