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

  

$id_poli=$_POST["id_poli"];
$nama_poli=$_POST["nama_poli"];



 
    $cek = mysqli_num_rows(mysqli_query($kon,"SELECT * FROM jenis_poli WHERE nama_poli='$nama_poli'"));

    if ($cek > 0){
    echo "<script>window.alert('nama poli sudah ada  ')
    window.location='input_poli.php'</script>";
    }else {
    mysqli_query($kon, "INSERT INTO jenis_poli (id_poli, nama_poli) VALUES ('$id_poli', '$nama_poli')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='datapoli.php'</script>";
    }
    }
    ?>





                <div class="card-body">
                  <h4 class="card-title">input data poli</h4>
                  <p class="card-description">
                   <BR>
                  </p>
                  <form class="forms-sample" action="input_poli.php" method="post" >

                    

                     <input name="id_poli" type="hidden" id="id_poli" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="P"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                   



                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Poli</label>
                      
                    <input type="text" class="form-control" id="nama_poli" name="nama_poli" placeholder="Nama Poli">


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
