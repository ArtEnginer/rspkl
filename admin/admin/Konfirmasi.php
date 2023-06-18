<?php
include('koneksidb.php');

$id_pendaftaran = $_GET['id_pendaftaran'];
$status="ok";
//query update
$query = "UPDATE pendaftaran SET status='$status'  WHERE id_pendaftaran='$id_pendaftaran' ";




if (mysqli_query($kon, $query)) {
    # credirect ke page index
    header("location:index.php");    
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
?>