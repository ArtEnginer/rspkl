<?php 

date_default_timezone_set('Asia/Jakarta');

include 'koneksidb.php'; 

include 'template/header.php'; 

include 'template/navbar.php'; 



?>




 <?php

 $tgl = date('Y-m-d');

            $query = mysqli_query($kon, "SELECT * FROM pendaftaran WHERE id_user='$_SESSION[id_user]' AND tanggal_daftar='$tgl'");
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
             <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Riwayat Berobat Pasien</h4>
                  <p class="card-description">
                     <code></code>
                  </p>
                  <div class="table-responsive">
                    

                     <?php


                    

                    $query1="SELECT * FROM jadwal_dokter  ";
                    

                    $tampil=mysqli_query($kon, $query1) or die(mysqli_error());


                

                    ?>

                    <table class="table">
                      
                      <thead>
                      <tr>
                        <th><center>No </center></th>
                        
                        <th><center>Nama Dokter</center></th>
                         <th><center>Nama Poli</center></th>
                        <th><center>Senen </center></th>
                         <th><center>Selasa</center></th>
                          <th><center>Rabu</center></th>
                         <th><center>Kamis</center></th>
                          <th><center>Jum"at</center></th>
                          <th><center>Sabtu</center></th>

                      </tr>
                  </thead>
                     <?php 

                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    {

                     

                     $no++; 


                      ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                
                
                    <td><center><?php echo $data['nama_dokter']; ?></center></td>
                      <td><center><?php echo $data['nama_poli']; ?></center></td>
                    <td><center><?php echo $data['Senin']; ?></center></td>
                    <td><center><?php echo $data['Selasa']; ?></center></td>
                    <td><center><?php echo $data['Rabu']; ?></center></td>
                    <td><center><?php echo $data['Kamis'];?></center></td>
                    <td><center><?php echo $data['Jumat'];?></center></td>
                    <td><center><?php echo $data['Sabtu'];?></center></td>


                    
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
