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
      $sql = mysqli_query($kon, "SELECT * FROM admin WHERE id_user='$id_user'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: dataadmin.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update'])){



       
      $nama           = $_POST['nama'];
      $alamat         = $_POST['alamat'];
      $username       = $_POST['username'];
      $password      = $_POST['password'];  

      $jenis_kelamin       = $_POST['jenis_kelamin'];



        
        
        $update = mysqli_query($kon, "UPDATE admin SET nama='$nama', alamat='$alamat', username='$username', password='$password', jenis_kelamin='$jenis_kelamin' WHERE id_user='$id_user'") or die(mysqli_error());



        if($update){
                    echo "<script>alert('Data Berhasil di ubah gan!'); window.location = 'dataadmin.php'</script>"; 
             
             

        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
        }
      }
      
      //if(isset($_GET['pesan']) == 'sukses'){
      //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
      //}
      ?>

    <?php
             $id_user = $_GET['id_user'];


      $sql = mysqli_query($kon, "SELECT * FROM admin WHERE id_user='$id_user'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: edit_admin.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update2'])){


       

        
                



        $filename="gambar_admin/" .$_FILES['gambar']['name'];

      



$move=move_uploaded_file($_FILES['gambar']['tmp_name'], $filename);
if(empty($filename))   //jika gambar koQsong atau tidak di ganti
{
                   $sqla= "UPDATE admin SET gambar='$filename'  WHERE id='$id'";


      $resu=mysqli_query($kon, $sqla) or die (mysqli_error());
echo "<script>alert ('data telah di perbarui ');document.location='index.php' </script> ";
}
elseif (!empty($filename)) 

// jika gambar di ganti
{

  $sqla= "UPDATE admin SET  gambar='$filename' WHERE id_user='$id_user'";


      $resu=mysqli_query($kon, $sqla) or die (mysqli_error());
echo "<script>alert ('data telah di update ');document.location='dataadmin.php' </script> ";
}

   }     
       


      ?>


                <div class="card-body">
                  <h4 class="card-title">Edit data admin</h4>
                  <p class="card-description">
                   <BR>
                  </p>
                   <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

                    

                     <input name="id_user" type="hidden" id="id_user" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="pasien"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                   



                     <div class="form-group">
                      <label for="exampleInputEmail1">Nama Admin</label>
                      
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" placeholder="Enter Full Name">

                    </div>



                   


                    <div class="form-group">

                      <label for="exampleInputEmail1">alamat</label>
                      
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" placeholder="alamat">
                      

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
                      
                     <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" placeholder="username">
                        

                    </div>
                  
                  <div class="form-group">

                      <label for="exampleInputEmail1">password</label>
                      
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Password">
                        

                    </div>

                   


                    
                    <button type="submit" name="update"  class="btn btn-primary mr-2">ubah data</button>
                    <button class="btn btn-light">Kembali</button>
                  </form>
                </div>
              </div>
            </div>
                                  
                <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4  class="card-title">Setting Fotto </h4>

                  <form class="" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    
                  <p class="card-description">
                   
                  </p>
                  <div class="template-demo">
                     <td rowspan="8"><img src="<?php echo $row['gambar'] ?>" class="img-rounded" height="300" width="290" style="border: 2px solid #666666;" /></td>
            
                   
                  <br>
                      <br>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="gambar" d="gambar" class="file-upload-default">
                      <div class="input-group col-xs-12">

                        <input type="text" id="gambar" name="gambar" class="form-control file-upload-info" disabled placeholder="Upload Image"  onchange="PreviewImage();">

                       

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <button type="submit" name="update2"  class="btn btn-primary mr-2">Ubah Foto</button>
                    
                  </div>
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
