
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

    $sql= "SELECT * FROM tbl_jadwal, tmp_presensi WHERE tbl_jadwal.`id_card` = tmp_presensi.`id_card`";
    $result = $conn->query($sql);
    $no=0;
    $id_card_sebelumnya="";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
            $id_card=$row["id_card"];
            if ($id_card==$id_card_sebelumnya){
                continue;
            }else{
                $id_card;
                $tgl = $row["tgl"];
                $jam = $row["jam"];
                $id_mapel = $row["id_mapel"];
                $id_kelas = $row["id_kelas"];
                $id_jurusan = $row["id_jurusan"];
                $id_waktu = $row["id_waktu"];
                $id_card_sebelumnya=$row["id_card"];
                $no++;
                // echo $id_mapel;
                $sql2= "SELECT nama_mapel FROM tbl_mapel where id_mapel= '$id_mapel'";
                $result2 = $conn->query($sql2);
                // $row = $result->fetch_assoc();
                if ($result2->num_rows > 0) {
                    while($row = $result2->fetch_assoc()) {
                        $dataMapel [$jmldata]= $row['nama_mapel'];
                    }
                }

                $sql3= "SELECT jenjang_kelas FROM tbl_kelas where id_kelas= '$id_kelas'";
                $result3 = $conn->query($sql3);
                // $row = $result->fetch_assoc();
                if ($result3->num_rows > 0) {
                    while($row = $result3->fetch_assoc()) {
                        $dataKelas [$jmldata]= $row['jenjang_kelas'];
                    }
                }

                $sql4= "SELECT singkatan FROM tbl_jurusan where id_jurusan= '$id_jurusan'";
                $result4 = $conn->query($sql4);
                // $row = $result->fetch_assoc();
                
                if ($result4->num_rows > 0) {
                    while($row = $result4->fetch_assoc()) {
                        $dataJurusan [$jmldata]= $row['singkatan'];
                    }
                    
                }

                $sql5= "SELECT jam_ke FROM tbl_waktu where id_waktu= '$id_waktu'";
                $result5 = $conn->query($sql5);
                // $row = $result->fetch_assoc();
                if ($result5->num_rows > 0) {
                    while($row = $result5->fetch_assoc()) {
                        $dataJam [$jmldata]= $row['jam_ke'];
                    }
                }

                $sql6= "SELECT nama_guru, id_card FROM tbl_guru where id_card= '$id_card'";
                $result6 = $conn->query($sql6);
                // $row = $result->fetch_assoc();
                if ($result6->num_rows > 0) {
                    while($row = $result6->fetch_assoc()) {
                        $dataGuru [$jmldata]= $row['nama_guru'];
                        $dataCard [$jmldata]= $row['id_card'];
                    }
                }
            }
            $jmldata++;
        }//tutup While Utama
    } else {
        echo "0 results";
    }
    $conn->close();
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
    <div class="row">
    <?php 
        for($i=0;$i<$jmldata;$i++){
            
    ?>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="card">
                <div class="card-body text-center" style="background: var(--bs-gray-200);"><img src="img/foto/<?php echo $dataCard[$i].'.jpg'?>" width="100px">
                    <h5 class="card-title" style="color: rgb(0,0,0);"><?php echo $dataGuru[$i]; ?></h5>
                    <h6 class="text-muted card-subtitle mb-2" style="color: rgb(0,0,0);"><?php echo $dataKelas[$i]." ".$dataJurusan[$i]; ?></h6>
                    <p class="card-text" style="color: rgb(0,0,0);"><?php echo $dataMapel[$i]; ?></p>
                </div>
            </div>
        </div>
    <?php
        }    
    ?>
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