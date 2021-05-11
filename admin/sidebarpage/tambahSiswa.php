<?php
$koneksi = mysqli_connect('localhost','root','','perpusku');
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
if(isset($_POST["submit"])){
  $NISN = $_POST["NISN"];
  $Nama = $_POST["Nama"];
  $Tgl_Lahir = $_POST["Tgl_Lahir"];
  $Kelas = $_POST["Kelas"];

  $query = "INSERT INTO siswa VALUES ('','$NISN','$Nama','$Tgl_Lahir','$Kelas')";
  mysqli_query($koneksi, $query);
  echo "
    <script>
    alert('data berhasil ditambah!');
    document.location.href = 'siswa.php';
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
  $resultSiswa = mysqli_query($koneksi,"SELECT count(*) FROM siswa");
  $rowSiswa = mysqli_fetch_array($resultSiswa);
  
  $total = $rowSiswa[0];

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
$result = mysqli_query($koneksi ,"SELECT * FROM siswa");
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
            <li><a href="../sidebarpage/peminjaman.php"><i class="fas fa-address-card"></i>Pinjaman</a></li>
            <li><a href="../sidebarpage/siswa.php"><i class="fas fa-user"></i>Siswa</a></li>
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
        <div class="title">Tambah Siswa</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">NISN</span>
            <input type="text" name="NISN" placeholder="Masukkan NISN Anda" required>
          </div>
          <div class="input-box">
            <span class="details">Nama</span>
            <input type="text" name="Nama" placeholder="Masukkan Nama Anda" required>
          </div>
          <div class="input-box">
            <span class="details">Tanggal Lahir</span>
            <input type="date" name="Tgl_Lahir" placeholder="Masukkan Tanggal Lahir Anda" required>
          </div>
          <div class="input-box">
            <span class="details">Kelas</span>
            <input type="text" name="Kelas" placeholder="Masukkan Kelas Anda" required>
          </div>
          <div class="button">
          <button type="submit" name="submit" >Tambah Siswa</button>
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