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
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?php echo $_SESSION['username']?></h3>


                  <h6 class="font-weight-normal mb-0">Lakukan Pendaftaran dengan menginput data antrian pasien secara online  <span class="text-primary"></span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white " type="text" id="" data-toggle="" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Tanggal -<?php echo date("d-m-Y"); ?>


                     

                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>

          <?php



            $query = mysqli_query($kon, "SELECT * FROM pasien WHERE id_user='$_SESSION[id_user]'");
            $data  = mysqli_fetch_array($query);
            ?>

           <div class="row">
             <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data 5 pendaftar Pasien Pertama </h4>
                  <h6> Tanggal -<?php echo date("d-m-Y"); ?> </h6>
                  <p class="card-description"> 
                     <code></code>
                  </p>

                  <div class="table-responsive">

                    

                       <?php

                       $tgl = date('Y-m-d');


                  


                    $query1="select * from pendaftaran WHERE status='belum' AND tanggal_daftar='$tgl'  LIMIT 5 ";
               

                    
                   
                    $tampil=mysqli_query($kon, $query1) or die(mysqli_error());
                    ?>



                    <table class="table">
                      
                      <thead>
                      <tr>
                        
                        
                        <th><left>id pendaftaran</center></th>
                       
                       
                          <th><left>jam daftar </center></th>
                       
                          <th><center>aksi</center></th>

                      </tr>
                  </thead>
                    

                        <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    {  ?>


                    <tbody>
                    <tr>
               
                  
                
                    <td><left><?php echo $data['id_pendaftaran']; ?></center></td>
                   
                    <td><left><?php echo $data['jam_daftar']; ?></center></td>
                    
           
                   


                        <td><a href="#" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?php echo $data['id_pendaftaran']; ?> ">Konfirmasi</a> 

                        


                        </td></tr>

                         <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id_pendaftaran']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                   
                    <h4 class="modal-title">Konfirmasi Pemanggilan </h4>
                  </div>
                  <div class="modal-body">

                    <form role="form" action="Konfirmasi.php" method="get">


                       

                       
                        <input type="hidden" name="id_pendaftaran" value="<?php echo $data['id_pendaftaran']; ?>">
                       

                       <div class="form-group">
                      <label for="exampleInputEmail1">Nomor Antrian</label>
                      
                    <input type="text" class="form-control" id="id_pendaftaran" name="id_pendaftaran" value="<?php echo $data['id_pendaftaran']; ?>" placeholder="Enter Full Name">

                    </div>

                         
                       
                        <div class="modal-footer">  
                          <button type="update" class="btn btn-sm btn-primary">Konfirmasi</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                             
                      </form>
                  </div>
                </div>
              </div>
            </div>
                    
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
          
            
            <div class="col-md-6 grid-margin transparent">
              <div class="row">


                <?php

                $tanggal_pendaftaran = date('Y-m-d');

                 $tampil=mysqli_query($kon, "select * from pasien  ");
                        $total=mysqli_num_rows($tampil);
                    ?>

                

                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Jumlah Pasien</p>
                      <p class="fs-30 mb-2"><?php echo $total; ?></p>

                       <p>---</p>
                     
                    </div>
                  </div>
                </div>

                  <?php $tampil2=mysqli_query($kon, "select * from dokter ");
                        $total2=mysqli_num_rows($tampil2);
                    ?>


                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Dokter</p>
                      <p class="fs-30 mb-2"><?php echo $total2; ?></p>
                      <p>---</p>
                    </div>
                  </div>
                </div>
              </div>

              <?php $tampil3=mysqli_query($kon, "select * from jenis_poli ");
                        $total3=mysqli_num_rows($tampil3);
                    ?>

              <div class="row">
                <div class="col-md-12 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Jumlah Poli</p>
                      <p class="fs-30 mb-2"><?php echo $total3; ?></p>
                     <p>---</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  
                </div>
              </div>
            </div>
          </div>
  <a width="70px" length="100px" type="button" href="pendaftaran.php" class="btn btn-primary btn-icon-text">
                          <i  class="ti-file btn-icon-prepend"></i>
                          Lihat Semua Data
                        </a> 

                    

   
          </div>
       
        
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      
<?php include 'template/footer.php'; ?>



        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

