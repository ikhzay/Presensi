<?php 
  
  include 'session.php';

  if ($level==1) {
    header('Location: berandaAdmin.php');
  }

  $sql = "SELECT tbl_mapel.`nama_mapel` as mapel, tbl_waktu.`jam_ke` as waktu, tbl_kelas.`jenjang_kelas` as kelas, tbl_jurusan.`singkatan` as jurusan
  FROM tbl_jadwal,`tbl_mapel`, tbl_waktu, tbl_kelas, tbl_jurusan
  WHERE tbl_jadwal.`id_mapel` = tbl_mapel.`id_mapel` 
  AND tbl_jadwal.`id_waktu`= tbl_waktu.`id_waktu`
  AND tbl_jadwal.`id_kelas`= tbl_kelas.`id_kelas`
  AND tbl_jadwal.`id_jurusan`= tbl_jurusan.`id_jurusan`
  AND tbl_jadwal.`id_card` = '$id_card'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $nama_guru; ?></title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon pr-0">
          <img src="img/smk.png" width="50px">
        </div>
        <div class="sidebar-brand-text mx-2">SMK PLUS NH</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#settingModal">
          <i class="fas fa-fw fa-cog"></i>
          <span>Pengaturan</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama_guru; ?></span>
                <img class="img-profile rounded-circle" src="img/smk.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#settingModal">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <a href="#" data-toggle="modal" data-target="#uploadFile"><button class="btn btn-success mb-2"><i class="fas fa-upload"></i> Upload File</button></a>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Santri</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Mapel</th>
                      <th>Waktu</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <!-- <th>Detail</th>
                      <th>Edit</th> -->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Mapel</th>
                      <th>Waktu</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <!-- <th>Detail</th>
                      <th>Edit</th> -->
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                        $no=0;
                        while($row = $result->fetch_assoc()) {
                        // echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                        $no++;
                        $mapel=$row["mapel"];
                        $waktu=$row["waktu"];
                        $kelas=$row["kelas"];
                        $jurusan=$row["jurusan"];
                        // $s_password=$row["s_password"];
                        // $status_lulus=$row["status_lulus"];
                        // $kos=$row["kos"];
                        // $spp=$row["spp"];
                        // $bangunan=$row["bangunan"];
                        // $s_foto="img/foto/".$row["s_foto"];
                        // $berkas=$row["berkas"];

                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $mapel; ?></td>
                      <td><?php echo $waktu; ?></td>
                      <td><?php echo $kelas; ?></td>
                      <td><?php echo $jurusan; ?></td>
                      <!-- <td><button  class="btn btn-sm btn-info"><i class="fas fa-info"></i></button></td>
                      <td><button  class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button></td> -->
                    </tr>
                    <?php 

                        }//tutup While Utama
                      } else {
                        echo "0 results";
                      }

                      $conn->close();

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan Tombol Logout Untuk Keluar</div>
        <div class="modal-footer">
         <!--  <form action="logout.php">
            
          </form> -->
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
          <!-- <button type="submit" class="btn btn-primary">Logout</button> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Setting Modal-->
  <div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
           <form action="gantiPassword.php" method="POST">
            <div class="form-group">
              <label for="exampleInputPassword1">ID</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $id_card; ?>" disabled>
              <input type="hidden" name="s_id" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $id_card; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password Lama</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <a href="#" onclick="passLama()"><i class="fas fa-eye"></i></a>
                  </div>
                </div>
                <input type="password" class="form-control" id="lama" placeholder="Password Lama" value="<?php echo $password; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password Baru</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <a href="#" onclick="passBaru()"><i class="fas fa-eye"></i></a>
                  </div>
                </div>
                <input type="password" name="s_password" class="form-control" id="baru" placeholder="Password Baru">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <!-- <a class="btn btn-primary" href="logout.php">Logout</a> -->
          <button type="submit" class="btn btn-primary">Ubah</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>