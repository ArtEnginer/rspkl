<?php 

date_default_timezone_set('Asia/Jakarta');

include 'koneksidb.php'; 

include 'template/header.php'; 

include 'template/navbar.php'; 



?>








      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">


 <?php

   if(isset($_POST['simpan'])){

  

$id_jadwal=$_POST["id_jadwal"];
$nama_dokter=$_POST["nama_dokter"];
$nama_poli=$_POST["nama_poli"];

$Senin=$_POST["Senin"];
$Selasa=$_POST["Selasa"];
$Rabu=$_POST["Rabu"];
$Kamis=$_POST["Kamis"];
$Jumat=$_POST["Jumat"];
$Sabtu=$_POST["Sabtu"];

 
    $cek = mysqli_num_rows(mysqli_query($kon,"SELECT * FROM jadwal_dokter WHERE nama_dokter='$nama_dokter'"));

    if ($cek > 0){
    echo "<script>window.alert('nama dokter sudah di masukan  ')
    window.location='input_jadwal.php'</script>";
    }else {
    mysqli_query($kon, "INSERT INTO jadwal_dokter (id_jadwal, nama_dokter, nama_poli, Senin,Selasa,Rabu,Kamis,Jumat,Sabtu) VALUES ('$id_jadwal', '$nama_dokter', '$nama_poli', '$Senin', '$Selasa', '$Rabu', '$Kamis', '$Jumat', '$Sabtu')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='jadwal.php'</script>";
    }
    }
    ?>





                <div class="card-body">
                  <h4 class="card-title">input data pasien</h4>
                  <p class="card-description">
                   <BR>
                  </p>
                  <form class="forms-sample" action="input_jadwal.php" method="post" >

                    

                     <input name="id_jadwal" type="hidden" id="id_jadwal" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="J"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                   





                     <div class="form-group">

                      <label for="exampleInputEmail1">Nama Dokter</label>
                      
                  <select name="nama_dokter" id="nama_dokter" class="form-control" required>
                           
                              <?php 
                    $query2="select * from dokter order by id_dokter";
                    $tampil=mysqli_query($kon, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['nama_dokter'];?>">-<?php echo $data1['nama_dokter'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 

                    </div>


                      <div class="form-group">

                      <label for="exampleInputEmail1">Nama Poli</label>
                      
                  <select name="nama_poli" id="nama_poli" class="form-control" required>
                           
                              <?php 
                    $query2="select * from jenis_poli order by id_poli";
                    $tampil=mysqli_query($kon, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['nama_poli'];?>">-<?php echo $data1['nama_poli'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 

                    </div>


                    <div class="form-group">

                      <label for="exampleInputEmail1">Senin</label>
                      
                    <input type="text" class="form-control" id="Senin" name="Senin" placeholder="Senin">
                      

                    </div>


                     <div class="form-group">

                      <label for="exampleInputEmail1">Selasa</label>
                      
                    <input type="text" class="form-control" id="Selasa" name="Selasa" placeholder="Selasa">
                      

                    </div>

                     <div class="form-group">

                      <label for="exampleInputEmail1">Rabu</label>
                      
                      <input type="text" class="form-control" id="Rabu" name="Rabu" placeholder="Enter Mobile Number">
                        

                    </div>

                     <div class="form-group">

                      <label for="exampleInputEmail1">Kamis</label>
                      
                     <input type="text" class="form-control" id="Kamis" name="Kamis" placeholder="Kamis">
                        

                    </div>
                  
                  <div class="form-group">

                      <label for="exampleInputEmail1">Jumat</label>
                      
                     <input type="text" class="form-control" id="Jumat" name="Jumat" placeholder="Jumat">
                        

                    </div>

                      <div class="form-group">

                      <label for="exampleInputEmail1">Sabtu</label>
                      
                     <input type="text" class="form-control" id="Sabtu" name="Sabtu" placeholder="Sabtu">
                        

                    </div>


                    
                    <button type="submit" name="simpan"  class="btn btn-primary mr-2">SiMPAN DATA</button>
                    <button class="btn btn-light">Kembali</button>
                  </form>
                </div>
              </div>
            </div>
             </div>
            </div>
                     
               
                        
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
      

      <?php include 'template/footer.php'; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

  <!-- End custom js for this page-->

    <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>


</body>

</html>
