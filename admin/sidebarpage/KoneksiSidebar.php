<?php 
$koneksi = mysqli_connect('localhost','root','','perpusku');
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

function hapus($id){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM siswa WHERE id = $id");
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
    $NISN = htmlspecialchars($data["NISN"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Tgl_Lahir = htmlspecialchars($data["Tgl_Lahir"]);
    $Kelas = htmlspecialchars($data["Kelas"]);

    $query = "UPDATE siswa SET 
                NISN = '$NISN',
                Nama = '$Nama',
                Tgl_Lahir = '$Tgl_Lahir',
                Kelas = '$Kelas',
                WHERE id = $id
                ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
 
?>