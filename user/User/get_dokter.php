<?php
// Koneksi ke database
$kon = mysqli_connect('localhost', 'root', '', 'rspkl');

// Periksa jika permintaan AJAX berisi data poliklinik yang dipilih
if (isset($_POST['poli'])) {
  $selectedPoli = $_POST['poli'];

  // Query untuk mendapatkan daftar dokter berdasarkan poliklinik yang dipilih
  $query = "SELECT nama_dokter FROM dokter WHERE nama_poli = '$selectedPoli'";
  $result = mysqli_query($kon, $query);

  $dokterList = array();

  // Memasukkan nama dokter ke dalam array
  while ($row = mysqli_fetch_assoc($result)) {
    $dokterList[] = $row['nama_dokter'];
  }

  // Mengirimkan respons dalam format JSON
  header('Content-Type: application/json');
  echo json_encode($dokterList);
}
?>
