<?php 

date_default_timezone_set('Asia/Jakarta');

include 'koneksidb.php'; 

include 'template/header.php'; 

include 'template/navbar.php'; 



?>




 


<?php


            $id_user = $_GET['id_user'];


      $sql = mysqli_query($kon, "SELECT * FROM pasien WHERE id_user='$id_user'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: setting.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update'])){


                    
$nama_pasien=$_POST["nama_pasien"];
$jenis_kelamin=$_POST["jenis_kelamin"];
$username=$_POST["username"];
$password=$_POST["password"];
$usia=$_POST["usia"];
$no_hp=$_POST["no_hp"];
$alamat=$_POST["alamat"];



        
                        
                $update = mysqli_query($kon, "UPDATE pasien SET nama_pasien='$nama_pasien', jenis_kelamin='$jenis_kelamin', username='$username', password='$password', usia='$usia', no_hp='$no_hp', alamat='$alamat' WHERE id_user='$id_user'") or die(mysqli_error());

                



                if($update){
                    echo "<script>alert('Data Berhasil di ubah gan!'); window.location = 'index.php'</script>"; 
             

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


      $sql = mysqli_query($kon, "SELECT * FROM pasien WHERE id_user='$id_user'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: setting.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update2'])){


       

        
                



        $filename="gambar/" .$_FILES['gambar']['name'];

      



$move=move_uploaded_file($_FILES['gambar']['tmp_name'], $filename);
if(empty($filename))   //jika gambar koQsong atau tidak di ganti
{
                   $sqla= "UPDATE pasien SET gambar='$filename'  WHERE id='$id'";


      $resu=mysqli_query($kon, $sqla) or die (mysqli_error());
echo "<script>alert ('data telah di perbarui ');document.location='index.php' </script> ";
}
elseif (!empty($filename)) 

// jika gambar di ganti
{

  $sqla= "UPDATE pasien SET  gambar='$filename' WHERE id_user='$id_user'";


      $resu=mysqli_query($kon, $sqla) or die (mysqli_error());
echo "<script>alert ('data telah di update ');document.location='index.php' </script> ";
}

   }     
       


      ?>

                


      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Akun Pasien</h4>
                  <p class="card-description">
                  <br>
                  </p>
                 

                <form class="forms-sample" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Pasien</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_pasien" id="exampleInputUsername2" value="<?php echo $data['nama_pasien']; ?>"  placeholder="Username" >

                         <input type="hidden" class="form-control" id="exampleInputUsername2" value="<?php echo $data['id_user']; ?>"  placeholder="Username" >

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="alamat"  id="exampleInputEmail2" value="<?php echo $data['alamat']; ?>" placeholder="alamat"  >

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">No Hp</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_hp"  id="exampleInputMobile" value="<?php echo $data['no_hp']; ?>"  placeholder="Mobile number">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="jenis_kelamin"  id="exampleInputPassword2" value="<?php echo $data['jenis_kelamin']; ?>"  placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Usia</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="usia"  id="exampleInputConfirmPassword2" value="<?php echo $data['usia']; ?>"  placeholder="Usia">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username"  id="exampleInputConfirmPassword2" value="<?php echo $data['username']; ?>"  placeholder="username">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">password</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="password"  id="exampleInputConfirmPassword2" value="<?php echo $data['password']; ?>"  placeholder="Password">
                      </div>
                    </div>


                    <div class="form-check form-check-flat form-check-primary">
                      
                    </div>
                  

                  <button type="submit" name="update"  class="btn btn-primary mr-2">Ubah Data</button>


                    <button class="btn btn-light">Cancel</button>
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
                     <td rowspan="8"><img src="<?php echo $data['gambar'] ?>" class="img-rounded" height="300" width="290" style="border: 2px solid #666666;" /></td>
            
                   
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
