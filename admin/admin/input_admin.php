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


    
                      $id_user        = $_POST['id_user'];
                      $nama           = $_POST['nama'];
                      $alamat         = $_POST['alamat'];
                      $username       = $_POST['username'];
                      $password      = $_POST['password'];
                     
                      $level          = "Admin";
                      $jenis_kelamin       = $_POST['jenis_kelamin'];
                      
 
    $cek = mysqli_num_rows(mysqli_query($kon,"SELECT * FROM admin WHERE nama='$nama'"));

    if ($cek > 0){
    echo "<script>window.alert('nama sudah ada  ')
    window.location='input_admin.php'</script>";
    }else {
    mysqli_query($kon, "INSERT INTO admin (id_user, nama, alamat,username,password,level,jenis_kelamin) VALUES ('$id_user', '$nama', '$alamat', '$username', '$password', '$level', '$jenis_kelamin')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='dataadmin.php'</script>";
    }
    }
    ?>




                <div class="card-body">
                  <h4 class="card-title">input data admin</h4>
                  <p class="card-description">
                   <BR>
                  </p>
                  <form class="forms-sample" action="input_admin.php" method="post" >

                    
  <input name="id_user" type="hidden" id="id_user" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="D"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                   



                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Admin</label>
                      
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Full Name">

                    </div>



                   


                    <div class="form-group">

                      <label for="exampleInputEmail1">alamat</label>
                      
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                      

                    </div>

                       <div class="form-group">

                      <label for="exampleInputEmail1">jenis_kelamin</label>
                      
                     <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required="required">
                         
                           <option value="Laki-Laki">Laki-Laki</option>

                            <option value="Perempuan">Perempuan</option>
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->

                                </select>
                        

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
