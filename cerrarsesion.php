<?php    
session_start();
$_SESSION=array(); //LIMPIA EL ARRAY
session_destroy();  //DESTRUYE

header('Location: login.php');
exit;

?>