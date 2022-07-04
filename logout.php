<?php
//function start lagi
session_start();

//cek apakah session terdaftar
// if(session_is_registered('s_id')){

//session terdaftar, saatnya logout
// session_unset();
session_destroy();
// }
// else{
//variabel session salah, user tidak seharusnya ada dihalaman ini. Kembalikan ke login
	header( 'Location: login.php' );
// }
?>