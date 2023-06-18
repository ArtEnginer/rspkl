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
            $id_user = $_GET['id_user'];
      $sql = mysqli_query($kon, "SELECT * FROM pasien WHERE id_user='$id_user'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: datapasien.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update'])){



$nama_pasien=$_POST["nama_pasien"];
$alamat=$_POST["alamat"];
$jenis_kelamin=$_POST["jenis_kelamin"];
$username=$_POST["username"];
$password=$_POST["password"];
$usia=$_POST["usia"];
$no_hp=$_POST["no_hp"];
$level="user";
      
                
        $update = mysqli_query($kon, "UPDATE pasien SET nama_pasien='$nama_pasien', alamat='$alamat', jenis_kelamin='$jenis_kelamin', username='$username', password='$password', usia='$usia', no_hp='$no_hp' WHERE id_user='$id_user'") or die(mysqli_error());



        if($update){
                    echo "<script>alert('Data Berhasil di ubah gan!'); window.location = 'datapasien.php'</script>"; 
             
             

        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
        }
      }
      
      //if(isset($_GET['pesan']) == 'sukses'){
      //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
      //}
      ?>




                <div class="card-body">
                  <h4 class="card-title">Edit data pasien</h4>
                  <p class="card-description">
                   <BR>
                  </p>
                   <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

                    

                     <input name="id_user" type="hidden" id="id_user" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="pasien"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                   



                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pasien</label>
                      
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?php echo $row['nama_pasien']; ?>" placeholder="Enter Full Name">


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
                      
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" placeholder="alamat">
                      

                    </div>


                     <div class="form-group">

                      <label for="exampleInputEmail1">usia</label>
                      
                    <input type="text" class="form-control" id="usia" name="usia" value="<?php echo $row['usia']; ?>" placeholder="usia">
                      

                    </div>

                     <div class="form-group">

                      <label for="exampleInputEmail1">Nomer Handphone</label>
                      
                      <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']; ?>" placeholder="Enter Mobile Number">
                        

                    </div>

                     <div class="form-group">

                      <label for="exampleInputEmail1">username</label>
                      
                     <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" placeholder="username">
                        

                    </div>
                  
                  <div class="form-group">

                      <label for="exampleInputEmail1">password</label>
                      
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Password">
                        

                    </div>


                    
                    <button type="submit" name="update"  class="btn btn-primary mr-2">ubah data</button>
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
