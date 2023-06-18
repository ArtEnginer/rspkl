<?php 

date_default_timezone_set('Asia/Jakarta');

include 'koneksidb.php'; 

include 'template/header.php'; 

include 'template/navbar.php'; 



?>




 <?php

 $tgl = date('Y-m-d');

            $query = mysqli_query($kon, "SELECT * FROM pendaftaran WHERE id_user='$_SESSION[id_user]' AND tanggal_daftar='$tgl' ")  ;
            $data  = mysqli_fetch_array($query);
            ?>

             <?php
            $querys = mysqli_query($kon, "SELECT * FROM dokter WHERE nama_poli='$data[nama_poli]'");
            $datas  = mysqli_fetch_array($querys);
            ?>

                


      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4  class="card-title">Antrian Saya</h4>
                  <p class="card-description">
                   
                  </p>
                  <div class="template-demo">
                    
                   <center> <h4><?php echo $_SESSION['nama_pasien']; ?></h4></center>
                   <br>
                    <center><h2><?php echo $data['id_pendaftaran']; ?></h2></center>
                     <br>
                    <center><h6><?php echo $data['tanggal_daftar']; ?></h6></center>
                     <br>
                    <center><h6><?php echo $data['nama_poli']; ?></h6></center>
                     <br>
                    <center><h3><?php echo $datas['nama_dokter']; ?></h3></center>
                     <br>
                   
                    <center> <h6>mohon untuk menunggu pemanggilan antrian sesuai nomor urut</h6> </center>
                  </div>
                </div>
              </div>
            </div>


                     
               </div>
<a type="button" href="cetak.php?id_pendaftaran=<?php echo $data['id_pendaftaran'];?>" target="_blank" class="btn btn-info btn-icon-text">
                          Cetak
                          <i class="ti-printer btn-icon-append"></i>                                                                              
                        </a>

                        
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
