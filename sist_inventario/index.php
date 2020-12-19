<?php
	require_once "Controller/ctr.login.php";
	require_once "Model/conexion.php";
	require_once "Model/modelo.login.php";
	require_once "Model/modelo.sesion.php";
	require_once "Controller/ctr.bodeguero.php";
	require_once "Model/modelo.bodeguero.php";
	$log = new ControladorLogin();
	$log -> ctrTraerLogin();