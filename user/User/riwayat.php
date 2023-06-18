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
             <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Riwayat Berobat Pasien</h4>
                  <p class="card-description">
                     <code></code>
                  </p>
                  <div class="table-responsive">
                    

                    

                       <?php
                    $query1="select * from pendaftaran INNER JOIN  dokter ON pendaftaran.nama_poli = dokter.nama_poli WHERE id_user='$_SESSION[id_user]' AND status='ok' ";



               

                    
                   
                    $tampil=mysqli_query($kon, $query1) or die(mysqli_error());
                    ?>



                    <table class="table">
                      
                      <thead>
                      <tr>
                        <th><center>No </center></th>
                        
                        <th><center>id pendaftaran</center></th>
                        <th><center>tanggal daftar </center></th>
                         <th><center>jam daftar</center></th>
                          <th><center>nama poli</center></th>
                         <th><center>nama dokter</center></th>
                        

                      </tr>
                  </thead>
                    

                        <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>


                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                  
                
                    <td><center><?php echo $data['id_pendaftaran']; ?></center></td>
                    <td><center><?php echo $data['tanggal_daftar']; ?></center></td>
                    <td><center><?php echo $data['jam_daftar']; ?></center></td>
                    <td><center><?php echo $data['nama_poli']; ?></center></td>
                    <td><center><?php echo $data['nama_dokter'];?></center></td>



                    
                     </div>
                 <?php   
              } 
              ?>
             
                   </tbody>

                    </table>
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
