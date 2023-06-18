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
                  <h4 class="card-title">Data Pendaftaran Baru</h4>
                  <p class="card-description">
                     <code></code>
                  </p>
                  <div class="table-responsive">
                    

                    

                       <?php
                    $query1="select * from pendaftaran WHERE status='belum' ";



               

                    
                   
                    $tampil=mysqli_query($kon, $query1) or die(mysqli_error());
                    ?>


  <?php
             if(isset($_GET['aksi']) == 'hapus'){
        $id_pendaftaran = $_GET['id_pendaftaran'];
        $cek = mysqli_query($kon, "SELECT * FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran'");
        if(mysqli_num_rows($cek) == 0){

          
        }else{
          $delete = mysqli_query($kon, "DELETE FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran'");
          if($delete){
            
              echo "<script>alert('Data Berhasil di hapus gan!'); window.location = 'pendaftaran.php'</script>";



          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>

      


                    <table class="table">
                      
                      <thead>
                      <tr>
                        <th><center>No </center></th>
                        
                        <th><center>id pendaftaran</center></th>
                        <th><center>tanggal daftar </center></th>
                         <th><center>jam daftar</center></th>
                          <th><center>nama poli</center></th>
                       
                        <th><center>aksi</center></th>

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
                    


                    <td>

                     


                       <a onclick="return confirm ('Yakin hapus <?php echo $data['id_pendaftaran'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Data bank" href="pendaftaran.php?aksi=hapus&id_pendaftaran=<?php echo $data['id_pendaftaran'];?>">Hapus <span class="glyphicon glyphicon-trash"></a></center>


                         <!-- Button untuk modal -->
                <a href="#" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?php echo $data['id_pendaftaran']; ?> ">Konfirmasi</a>
              </td>
            </tr>
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

                        </td></tr>


                    
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
