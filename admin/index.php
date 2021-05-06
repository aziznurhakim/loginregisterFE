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
  table{
    width: 100%;
    border: 1px solid black;
  }
  </style>
</head>
<body>
<?php 
	session_start();
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
</div>
	
         
      </div>
      
      
      
    </div>


    
</div>


</body>
</html>