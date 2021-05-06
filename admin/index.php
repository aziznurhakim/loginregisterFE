
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perpus Ku</title>
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
  include 'koneksi.php';
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}	
	?>

<div class="wrapper">
    <div class="sidebar">
        <h2>Perpus Ku</h2>
        <ul>
			
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
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
      <img style="float: left;" src="../asset/user.png"/>
      <h3>9</h3>
      <p>Total Siswa</p>
      <p> .</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img style="float: left;" src="../asset/agenda.png"/>
      <h3>10</h3>
      <p>Total Buku</p>
      <p> .</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img style="float: left;" src="../asset/bookmark.png"/>
      <h3>11</h3>
      <p>Total Pinjaman</p>
      <p> .</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img style="float: left;" src="../asset/favourite.png"/>
      <h3>12</h3>
      <p>Total Pengembalian</p>
      <p> .</p>
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
    <a href=$delete>ubah</a> |
    <a href="">hapus</a>
    </tr>
    <?php endforeach?>
    </table>
</div>
	
         
      </div>
    </div>


    
</div>


</body>
</html>