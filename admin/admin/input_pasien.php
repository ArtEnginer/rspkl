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

  

$id_user=$_POST["id_user"];
$nama_pasien=$_POST["nama_pasien"];
$alamat=$_POST["alamat"];
$jenis_kelamin=$_POST["jenis_kelamin"];
$username=$_POST["username"];
$password=$_POST["password"];
$usia=$_POST["usia"];
$no_hp=$_POST["no_hp"];
$level="User";

 
    $cek = mysqli_num_rows(mysqli_query($kon,"SELECT * FROM pasien WHERE id_user='$id_user'"));

    if ($cek > 0){
    echo "<script>window.alert('anda sudah melakukan pasien  ')
    window.location='input_pasien.php'</script>";
    }else {
    mysqli_query($kon, "INSERT INTO pasien (id_user, nama_pasien, alamat, no_hp,username,password,level,jenis_kelamin,usia) VALUES ('$id_user', '$nama_pasien', '$alamat', '$no_hp', '$username', '$password', '$level', '$jenis_kelamin', '$usia')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='datapasien.php'</script>";
    }
    }
    ?>





                <div class="card-body">
                  <h4 class="card-title">input data pasien</h4>
                  <p class="card-description">
                   <BR>
                  </p>
                  <form class="forms-sample" action="input_pasien.php" method="post" >

                    

                     <input name="id_user" type="hidden" id="id_user" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="pasien"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                   



                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pasien</label>
                      
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Enter Full Name">


                    </div>



                    <div class="form-group">

                      <label for="exampleInputEmail1">jenis kelamin</label>
                      
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                
              </select>

                    </div>


                    <div class="form-group">

                      <label for="exampleInputEmail1">alamat</label>
                      
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                      

                    </div>


                     <div class="form-group">

                      <label for="exampleInputEmail1">usia</label>
                      
                    <input type="text" class="form-control" id="usia" name="usia" placeholder="usia">
                      

                    </div>

                     <div class="form-group">

                      <label for="exampleInputEmail1">Nomer Handphone</label>
                      
                      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Enter Mobile Number">
                        

                    </div>

                     <div class="form-group">

                      <label for="exampleInputEmail1">username</label>
                      
                     <input type="text" class="form-control" id="username" name="username" placeholder="username">
                        

                    </div>
                  
                  <div class="form-group">

                      <label for="exampleInputEmail1">password</label>
                      
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        

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
