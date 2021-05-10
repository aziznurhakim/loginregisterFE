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
function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi,$query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function ubah($data){
    global $koneksi;
    $id = $data["id"];
    $judul_buku = htmlspecialchars($data["judul_buku"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $jumlah_buku = htmlspecialchars($data["jumlah_buku"]);
    $jumlah_halaman = htmlspecialchars($data["jumlah_halaman"]);

    $query = "UPDATE buku SET 
                judul_buku = '$judul_buku',
                pengarang = '$pengarang',
                penerbit = '$penerbit',
                jumlah_buku = '$jumlah_buku',
                jumlah_halaman = '$jumlah_halaman'
                WHERE id = $id
                ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
 
?>