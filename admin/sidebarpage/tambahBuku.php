<?php
$koneksi = mysqli_connect('localhost','root','','perpusku');
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
if(isset($_POST["submit"])){
  $judul_buku = $_POST["judul_buku"];
  $pengarang = $_POST["pengarang"];
  $penerbit = $_POST["penerbit"];
  $jumlah_buku = $_POST["jumlah_buku"];
  $jumlah_halaman = $_POST["jumlah_halaman"];

  $query = "INSERT INTO buku VALUES ('','$judul_buku','$pengarang','$penerbit','$jumlah_buku','$jumlah_halaman')";
  mysqli_query($koneksi, $query);
  echo "
    <script>
    alert('data berhasil ditambah!');
    document.location.href = 'buku.php';
    </script>
    ";
  
}

?>
</script>
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
        form .button{
            height: 45px;
            margin: 45px 0;
            outline: none;
            
        }
        button{
            height: 100%;
            width: 100%;
            outline: 0;
            border-radius: 5px;
            
            background: linear-gradient(to right bottom, #65dfc9, #6cdbeb);
        }
        button:focus { outline:0 !important; }
    </style>
</head>
<body>
<?php 
	session_start();
  $koneksi = mysqli_connect('localhost','root','','perpusku');
  $resultBuku = mysqli_query($koneksi,"SELECT count(*) FROM buku");
  $rowBuku = mysqli_fetch_array($resultBuku);
  
  $total = $rowBuku[0];

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
			
            <li><a href="../index.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="../sidebarpage/buku.php"><i class="fas fa-book"></i>Buku</a></li>
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
        <div class="title">Tambah Buku</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Judul Buku</span>
            <input type="text" name="judul_buku" placeholder="Masukkan Judul Buku" required>
          </div>
          <div class="input-box">
            <span class="details">Pengarang</span>
            <input type="text" name="pengarang" placeholder="Masukkan Pengarang" required>
          </div>
          <div class="input-box">
            <span class="details">Penerbit</span>
            <input type="text" name="penerbit" placeholder="Masukkan Penerbit" required>
          </div>
          <div class="input-box">
            <span class="details">Jumlah Buku</span>
            <input type="text" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" required>
          </div>
          <div class="input-box">
            <span class="details">Jumlah Halaman</span>
            <input type="text" name="jumlah_halaman" placeholder="Masukkan Jumlah Halaman" required>
          </div>
          <div class="button">
          <button type="submit" name="submit" >Tambah Buku</button>
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