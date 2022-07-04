<?php
    session_start();
    include 'conn.php';

    $id_card=$_SESSION['id_card'];
    $level=$_SESSION['level'];
    $nama_guru=$_SESSION['nama_guru'];
    if (!isset($_SESSION['id_card']))
    {
	    echo "<SCRIPT> //not showing me this
	        alert('Anda Belum Login')
	        window.location.replace('login.php');
	    </SCRIPT>";
	}
?>