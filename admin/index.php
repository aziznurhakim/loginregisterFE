<?php
$koneksi = mysqli_connect('localhost','root','','perpusku');
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
if(isset($_POST["submit"])){
  $judul_buku = $_POST["judul_buku"];
  $nama_siswa = $_POST["nama_siswa"];
  $tgl_pinjam = $_POST["tgl_pinjam"];
  $tgl_kembali = $_POST["tgl_kembali"];

  $query = "INSERT INTO peminjaman VALUES ('','$judul_buku','$nama_siswa','$tgl_pinjam','$tgl_kembali')";
  mysqli_query($koneksi, $query);
  echo "
    <script>
    alert('buku berhasil di pinjam!');
    document.location.href = '../admin/index.php';
    </script>
    ";
  
}
$resultBuku = mysqli_query($koneksi,"SELECT count(*) FROM buku");
$resultSiswa = mysqli_query($koneksi,"SELECT count(*) FROM siswa");
$resultPinjaman = mysqli_query($koneksi,"SELECT count(*) FROM peminjaman");
// row
$rowBuku = mysqli_fetch_array($resultBuku);
$rowSiswa = mysqli_fetch_array($resultSiswa);
$rowPinjaman = mysqli_fetch_array($resultPinjaman);


$totalPinjaman = $rowPinjaman[0];
$totalSiswa = $rowSiswa[0];

  $totalBuku = $rowBuku[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perpus Ku</title>
	<link rel="stylesheet" href="../admin/styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../admin/css/cardcss.css">
  <style>
   <style>
        .info{
            width: 100%;
            max-width: 700px;
            background: #fff;
            padding: 25px 30px;
            border-radius: 5px;
        }
        .form .user-details .input-box{
            width: calc(100% / 2 - 20px);
            
        }
        .user-details .input-box input{
            height: 45px;
            width: 100%;
        }
        .user-details .input-box input{
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
        }
        form #button{
            height: 45px;
            margin: 45px 0;
            outline: none;
            
        }
        #button{
            height: 100%;
            width: 100%;
            outline: 0;
            border-radius: 5px;
            
            background: linear-gradient(to right bottom, #65dfc9, #6cdbeb);
        }
        button:focus { outline:0 !important; }
    
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
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
$result = mysqli_query($koneksi ,"SELECT * FROM buku");
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}	
	?>

<div class="wrapper">
    <div class="sidebar">
        <h2>Perpus Ku</h2>
        <ul>
			
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="../admin/sidebarpage/buku.php"><i class="fas fa-book"></i>Buku</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Siswa</a></li>
            <li><a href="../admin/sidebarpage/peminjaman.php"><i class="fas fa-address-card"></i>Pinjaman</a></li>
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
      <h3><?php echo $totalSiswa; ?></h3>
      <p>Total Siswa</p>
      <Button class="color-change">Tambah Siswa</Button>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img style="float: left;" src="../asset/agenda.png"/>
      <h3><?php echo $totalBuku; ?></h3>
      <p>Total Buku</p>
      <Button href="tambahpeminjaman.php" class="color-change">Tambah Buku</Button>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img style="float: left;" src="../asset/bookmark.png"/>
      <h3><?php echo $totalPinjaman; ?></h3>
      <p>Total Pinjaman</p>
      <Button class="color-change">Tambah Pinjaman</Button>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img style="float: left;" src="../asset/favourite.png"/>
      <h3>12</h3>
      <p>Total Pengembalian</p>
      <Button class="color-change">Tambah Pinjaman</Button>
    </div>
      </div>
      <div class="info">
        <div class="title">Tambah Pinjaman</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Judul Buku</span>
            <input type="text" name="judul_buku" placeholder="Masukkan Judul Buku" required>
          </div>
          <div class="input-box">
            <span class="details">Nama Siswa</span>
            <input type="text" name="nama_siswa" placeholder="Masukkan Nama Siswa" required>
          </div>
          <div class="input-box">
            <span class="details">Tanggal Pinjam</span>
<input type="date" id="start" name="tgl_pinjam" required
       value="<?php date("Y-m-d")?>">
          </div>
          <div class="input-box">
            <span class="details">Tanggal Kembali</span>
            <input type="date" id="start" name="tgl_kembali" required
       value="<?php date("Y-m-d")?>">
          </div>
          <div class="button">
          <button type="submit" name="submit" id="button">Submit Buku</button>
        </div>
        </div>
        
    
      </form>
    </div>

</div>
	
         
      </div>
    </div>


    
</div>


</body>
</html>