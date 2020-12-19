<?php 
include_once '../Model/modelo.sesion.php';
$userSession = new Session();
$userSession->closeSession();
header("location: ../index.php");
?>