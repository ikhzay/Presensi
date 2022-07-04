<?php
include 'conn.php';
session_start();

$id_card=$_POST['id_card'];
$password=$_POST['password'];

// echo $id_card."<br>".$password;
$sql = "SELECT * FROM tbl_guru WHERE id_card='$id_card' AND password='$password'";
// $sql = "SELECT * FROM tbl_guru WHERE id_card='$id_card'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
    // echo "Nama ".$row['s_nama'];
    $_SESSION["id_card"] = $row['id_card'];
    $_SESSION["level"] = $row['level'];
    $_SESSION["nama_guru"] = $row['nama_guru'];
    if($row['level']==0){
      header('Location: beranda.php');
    }else{
      header('Location: berandaAdmin.php');
    }

	  
  }
} else {
  // echo "0 results";
	// header('Location: http://www.example.com/');
	echo "<SCRIPT> //not showing me this
        alert('ID Card atau Password Salah')
        window.location.replace('login.php');
    </SCRIPT>";
}

$conn->close();
?>