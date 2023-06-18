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
// Menghubungkan ke database
$conn = mysqli_connect('localhost', 'root', '', 'rspkl');

// Cek Koneksi
if (!$conn) {
    echo "Gagal terhubung ke database!";
    die;
}

// Mendapatkan tanggal saat ini
$currentDate = date('Y-m-d');

// Mendapatkan tanggal terakhir dalam database
$query = mysqli_query($conn, "SELECT tanggal_daftar FROM pendaftaran ORDER BY tanggal_daftar DESC LIMIT 1");
$data = mysqli_fetch_array($query);
$lastDate = $data['tanggal_daftar'];

// Memeriksa apakah tanggal saat ini berbeda dengan tanggal terakhir dalam database
if ($currentDate != $lastDate) {
    // Jika tanggal berbeda, set nomor urut ke 1
    $no = 1;
} 
if ($currentDate == $lastDate){
    // Jika tanggal sama, lanjutkan nomor urut dari data terakhir dalam database

    // Mencari data (kode) yang paling besar (terakhir) dari database
    $query = mysqli_query($conn, "SELECT max(id_pendaftaran) as max_kode FROM pendaftaran WHERE tanggal_daftar = '$currentDate'");
    $data = mysqli_fetch_array($query);
    $id_pendaftaran = $data['max_kode'];

    // Memperoleh angka dari nomor urut terakhir
    $no = (int)substr($id_pendaftaran, 1, 4);
    $no += 1;
}

// Menghasilkan nomor urut dengan format yang diinginkan
$newKode = 'A' . sprintf("%03s", $no);
//proses
   if(isset($_POST['simpan'])){

    
$id_pendaftaran = $_POST['id_pendaftaran'];
$id_user = $_SESSION['id_user'];
$nama_poli = $_POST['nama_poli'];
$tanggal_daftar = $_POST['tanggal_daftar'];
$jam_daftar = $_POST['jam_daftar'];
$cara_bayar = $_POST['cara_bayar'];
$status="belum";
$nama_dokter = $_POST['nama_dokter'];



 
    $cek = mysqli_num_rows(mysqli_query($kon,"SELECT * FROM pendaftaran WHERE id_user='$_SESSION[id_user]' AND status='belum'"));

    if ($cek > 0){
    echo "<script>window.alert('anda sudah melakukan pendaftaran  ')
    window.location='antriansaya.php'</script>";
    }else {
    mysqli_query($kon, "INSERT INTO pendaftaran (id_pendaftaran, id_user, nama_poli, cara_bayar,tanggal_daftar,jam_daftar,status,nama_dokter) VALUES ('$id_pendaftaran', '$id_user', '$nama_poli', '$cara_bayar', '$tanggal_daftar', '$jam_daftar', '$status', '$nama_dokter')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='antriansaya.php'</script>";
    }
    }
    ?>





                <div class="card-body">
                  <h4 class="card-title">PENDAFTARAN PASEN</h4>
                  <p class="card-description">
                   <BR>
                  </p>
                  <form class="forms-sample" action="daftar.php" method="post" >

                    

                    <input name="id_pendaftaran" type="hidden" id="id_pendaftaran" class="form-control" placeholder="Tidak perlu di isi" value="<?php echo $newKode; ?>" autofocus="on" readonly="readonly" />
                   
                     <input type='hidden' class="form-control" type="text" value="<?php echo date("Y-m-d"); ?>" name="tanggal_daftar" ReadOnly required='required' />

                     <input type='hidden' class="form-control" type="text" value="<?php echo date('H:i:s a'); ?>" name="jam_daftar" id="jam_daftar" ReadOnly required='required' />


                    <div class="form-group">
                      <label for="exampleInputEmail1">Poliklinik Tujuan</label>
                      

                      <select name="nama_poli" id="nama_poli" class="form-control" required>
                           
                              <?php 
                    $query2="select * from jenis_poli order by id_poli";
                    $tampil=mysqli_query($kon, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['nama_poli'];?>">-<?php echo $data1['nama_poli'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 


                    </div>


                  
                  
                  



                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama dokter</label>
                      

                      <select name="nama_dokter" id="nama_dokter" class="form-control" required>
                           
                              <?php 
                    $query2="select * from dokter order by id_dokter";
                    $tampil=mysqli_query($kon, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['nama_dokter'];?>">-<?php echo $data1['nama_dokter'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 


                    </div>


                     <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Cara Bayar</label>
                      
                       <select name="cara_bayar" id="cara_bayar" class="form-control">
                
                                    <option value="UMUM">UMUM</option>
                                    <option value="BPJS">BPJS</option>
                
              </select>


                    </div>


                    

                    
                    <button type="submit" name="simpan"  class="btn btn-primary mr-2">SiMPAN PENDAFTARAN</button>
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

 <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>

</html>
