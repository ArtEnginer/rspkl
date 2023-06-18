<?php
//Include file koneksi ke database


include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran


$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "rspkl";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
  echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}  



$id_user=$_POST["id_user"];
$nama_pasien=$_POST["nama_pasien"];
$jenis_kelamin=$_POST["jenis_kelamin"];
$username=$_POST["username"];
$password=$_POST["password"];
$usia=$_POST["usia"];
$tgl_lahir=$_POST["tgl_lahir"];
$no_hp=$_POST["no_hp"];

$level="User";



	









// VALIDASI 






 $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pasien WHERE nama_pasien='$nama_pasien' or username='$username'"));

  if ($cek > 0){
    echo "<script>window.alert('nama atau username sudah ada cek ulang')
    window.location='prosesregistrasi.php'</script>";
    }else {

// referensi malasngoding.com/cara-membuat-form-validasi-dengan-php/
  $sql="insert into pasien (id_user,nama_pasien,jenis_kelamin,no_hp,username,password,usia,tgl_lahir,level) values
		('$id_user','$nama_pasien','$jenis_kelamin','$no_hp','$username','$password','$usia','$tgl_lahir','$level')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($kon,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	
	echo "<script>alert('Akun Berhasil Dibuat Silahkan Login Untuk lebih lanjut!'); window.location = 'login.php'</script>";
	
                  
                           

	exit;
  }
} 
?>