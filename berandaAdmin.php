<?php 
  
  include 'session.php';

  if ($level==0) {
    header('Location: beranda.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin</title>
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

    <?php include "sidebar.php" ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include "topbar.php" ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <a href="#" data-toggle="modal" data-target="#uploadFile"><button class="btn btn-success mb-2"><i class="fas fa-upload"></i> Upload File</button></a>

          <!-- DataTales Example -->
          <div class="row">
          <div class="col">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Card</th>
                      <th>Nama Guru</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>ID Card</th>
                      <th>Nama Guru</th>
                      <th>Detail</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
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
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $s_id; ?>" disabled>
              <input type="hidden" name="s_id" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $s_id; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password Lama</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <a href="#" onclick="passLama()"><i class="fas fa-eye"></i></a>
                  </div>
                </div>
                <input type="password" class="form-control" id="lama" placeholder="Password Lama" value="<?php echo $s_password; ?>">
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
          <button type="submit" class="btn btn-primary">Ubah</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Detail Data Modal-->
  <div class="modal fade" id="detailData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <form id="formDetail">
                    
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button id="ubah" class="btn btn-primary" type="button" data-dismiss="modal">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Detail Modal-->
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
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $s_id; ?>" disabled>
              <input type="hidden" name="s_id" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $s_id; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password Lama</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <a href="#" onclick="passLama()"><i class="fas fa-eye"></i></a>
                  </div>
                </div>
                <input type="password" class="form-control" id="lama" placeholder="Password Lama" value="<?php echo $s_password; ?>">
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

</script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript">
      //Menampilkan data
      $(document).ready(function(){
            //menggunakan fungsi ajax untuk pengambilan data
            var t = $('#dataTable').DataTable();
            $.ajax({
                type : 'get',
                url : 'http://localhost:8080/presensi/api/guru',
                dataType : 'json',
                success : function(data){
                  console.log(data.data.length);
                  for (let i=0; i<data.data.length ; i++){
                    t.row.add([(i+1), data.data[i].id_card , data.data[i].nama_guru , '<a href="#detailData" data-toggle="modal" data-id="'+data.data[i].id_card+'"><button  class="btn btn-sm btn-info"><i class="fas fa-info"></i></button></a>']).draw(false);
                  }
                }
            });
      });

    //Mengambil data untuk diubah
      $(document).ready(function(){
        $('#detailData').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            console.log(rowid);
            $.ajax({
                type : 'get',
                url : 'http://localhost:8080/presensi/api/guru/'+rowid,
                dataType : 'json',
                // data :  'rowid='+ rowid,
                success : function(data){
                  data =  '<img class="text-center" src="img/foto/'+data.data.foto+'" width="100px">'+
                          '<input class="form-control" type="text" id="id_card" value="'+data.data.id_card+'">'+
                          '<input class="form-control" type="text" id="nama_guru" value="'+data.data.nama_guru+'">';
                  $('#formDetail').html(data);//menampilkan data ke dalam modal
                  // console.log(data.data.nama_guru);
                }
            });
         });
      });

      //Mengubah data
      $(document).ready(function(){
        $('#ubah').click(function(event){
            let id_card = document.getElementById('id_card').value;
            let nama_guru = document.getElementById('nama_guru').value;
            $.ajax({
                url : 'http://localhost:8080/presensi/api/guru/'+id_card,
                method : 'PUT',
                dataType : 'json',
                data :{
                  id_card : id_card,
                  nama_guru : nama_guru
                },
                success : function(data){
                  console.log(data);
                  window.location.reload();
                }
              });
        });
      });
  </script>
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