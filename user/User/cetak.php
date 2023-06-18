
<?php 

date_default_timezone_set('Asia/Jakarta');

include 'koneksidb.php'; 





?>


<html>
<head>


  <?php

 $tgl = date('Y-m-d');

            $query = mysqli_query($kon, "SELECT * FROM pendaftaran INNER JOIN  pasien ON pendaftaran.id_user = pasien.id_user  WHERE id_pendaftaran='$_GET[id_pendaftaran]' AND tanggal_daftar='$tgl'");

         


            $data  = mysqli_fetch_array($query);
            ?>

             <?php
            $querys = mysqli_query($kon, "SELECT * FROM dokter WHERE nama_poli='$data[nama_poli]'");
            $datas  = mysqli_fetch_array($querys);
            ?>


<title>Nomer Antrian</title>
</head>
<body>
<table border="2">
<tr bgcolor="black">
<td colspan="3"><b><font color="white"><center>NOMER ANTRlAN</b></td>
</tr>
<tr>

<td length="200px"  >   <center><font size="5" > <?php echo $data['nama_pasien']; ?>
<br/>
<br/>
<?php echo $data['id_pendaftaran']; ?><br/><br/>
<?php echo $data['tanggal_daftar']; ?><br/><br/>
<?php echo $data['nama_poli']; ?><br/><br/>
<?php echo $datas['nama_dokter']; ?>5</td></font>
<br/>

</tr>
<tr bgcolor="black">
<td colspan="3"><b><font color="white"><center>RSU An Ni'mah Wangon</center></b></td>
</tr>
</body>
</html>


<script>
    window.print();
  </script>