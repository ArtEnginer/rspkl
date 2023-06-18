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
            $id_poli = $_GET['id_poli'];
      $sql = mysqli_query($kon, "SELECT * FROM jenis_poli WHERE id_poli='$id_poli'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: datapoli.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update'])){



      


$nama_poli=$_POST["nama_poli"];


                
        $update = mysqli_query($kon, "UPDATE jenis_poli SET nama_poli='$nama_poli'WHERE id_poli='$id_poli'") or die(mysqli_error());



        if($update){
                    echo "<script>alert('Data Berhasil di ubah gan!'); window.location = 'datapoli.php'</script>"; 
             
             

        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
        }
      }
      
      //if(isset($_GET['pesan']) == 'sukses'){
      //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
      //}
      ?>




                <div class="card-body">
                  <h4 class="card-title">Edit data dokter</h4>
                  <p class="card-description">
                   <BR>
                  </p>
                   <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

                    

                    
                   





                    
     <div class="form-group">
                      <label for="exampleInputEmail1">Nama Poli</label>
                      
                    <input type="text" class="form-control" id="nama_poli" name="nama_poli" value="<?php echo $row['nama_poli']; ?>" placeholder="Nama Poli">


                    </div>

                    

                     

                    
                  
                 

                    
                    <button type="submit" name="update"  class="btn btn-primary mr-2">ubah data</button>
                    <a href="datapoli.php" class="btn btn-light">Kembali</a>
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
