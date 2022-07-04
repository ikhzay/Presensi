<?php
    include "conn.php";
    $hari = "";
    $day = date("l");
    $dataJurusan= array();
    $dataMapel= array();
    $dataKelas= array();
    $dataJam= array();
    $dataGuru =array();
    $dataCard= array();
    $jmldata=0;
    if ($day=="Sunday") $hari = "Ahad";
    if ($day=="Monday") $hari = "Senin";
    if ($day=="Tuesday") $hari = "Selasa";
    if ($day=="Wednesday") $hari = "Rabu";
    if ($day=="Thursday") $hari = "Kamis";
    if ($day=="Friday") $hari = "Jumat";
    if ($day=="Saturday") $hari = "Sabtu";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>tes</title>
    <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?php echo $hari.", ".date("d-m-Y")?>
                <br><a href="login.php"><button class="btn btn-info">Login</button></a>
            </h1>
        </div>
    </div>
    <div class="row" id="dataPresensi">
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="card">
            </div>
        </div>
    </div>
     <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        //Menampilkan data
      $(document).ready(function(){
            //menggunakan fungsi ajax untuk pengambilan data
            presensi = '';
            $.ajax({
                type : 'get',
                url : 'http://localhost:8080/presensi/api/presensi',
                dataType : 'json',
                success : function(data){
                    // console.log(data.jadwal);
                    for (i=0 ; i<data.jadwal.length ; i++){
                        // console.log(data.ket[i]);
                        presensi +=  '<div class="col-sm-2 col-md-2 col-lg-2">'+
                                        '<div class="card">'+
                                            '<div class="card-body text-center" style="background: var(--bs-gray-200);">'+
                                            '<img src="img/foto/'+data.jadwal[i].guru[0].foto+'" width="100px">'+
                                            '<h5 class="card-title" style="color: rgb(0,0,0);">'+data.jadwal[i].guru[0].nama_guru+'</h5>'+
                                            '<h6 class="text-muted card-subtitle mb-2" style="color: rgb(0,0,0);">'+data.jadwal[i].kelas[0].jenjang_kelas+' '+data.jadwal[i].jurusan[0].singkatan+'</h6>'+
                                            '<p class="card-text" style="color: rgb(0,0,0);">'+data.jadwal[i].mapel[0].nama_mapel+'</p>'+
                                            '<p class="card-text" style="color: rgb(0,0,0);">'+data.ket[i]+'</p>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
                    }

                    $('#dataPresensi').html(presensi);
                }
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