<?php 
$koneksi = mysqli_connect('localhost','root','','perpusku');
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

function hapus($id){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM buku WHERE id = $id");
	return mysqli_affected_rows($koneksi);
}
$id = $_GET["id"];
if(hapus($id)> 0){
    echo "
    <script>
    alert('data berhasil dihapus!');
    document.location.href = 'buku.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal dihapus!');
    document.location.href = 'buku.php';
    </script>
    ";
};
?>